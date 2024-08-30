<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Service;
use App\Models\Enquiry;
use App\Models\ServiceMember;
use App\Models\MembershipEnquiry;
use App\Mail\DemoAdminMail; 
use App\Mail\DemoUserMail;
use App\Mail\DemoMembershipAdminMail;
use App\Mail\DemoMembershipUserMail;
use Illuminate\Support\Facades\Mail;
use App\Helpers\ImageSave;

use Log;
class FrontendController extends Controller
{
    public function index(){
        $banners = Banner::where('status',1)->get();
        $services = Service::where('status',1)->get();

        return view('frontendviews.index',['banners'=>$banners,'services'=>$services]);

    }

    public function about(){
        return view('frontendviews.about');

    }

    public function service(Request $request){

        $search = $request->input('search');

        $services = Service::where('name', 'LIKE', "%{$search}%")->where('status',1)->get();
 
        return view('frontendviews.services',['services'=>$services]);
 
 
    return abort(404);
 
    }

    public function membership(){
        return view('frontendviews.membership');
        
    }

    public function contactUs(){
        return view('frontendviews.contact');
        
    }
   
    
    public function serviceDetails($slug_name){

        $service = Service::where('slug_name',$slug_name)->where('status',1)->first();
         if($service){
        $service_members = ServiceMember::where('service_id',$service->id)->where('status',1)->get(); 
        return view('frontendviews.service_details',['service_members'=>$service_members,'service'=>$service]);
         }
         else{
        
            return abort(404);
         }
        
        
    }
    
    public function enquiry(Request $request){

        $enquiries = new Enquiry;
         
          if($request->service_member_id){
         

            $request->validate([
                'name' => 'required|max:254',
                'email' => 'required|email',
                'mobile' => 'required|regex:/^[6-9]\d{9}$/|integer',
                'subject'=>'required',
                'message'=>'required',
        
    
            ]);

                $enquiries->expert_name = $request->expert_name;
                $enquiries->service_member_id = $request->service_member_id;
                $enquiries->name = $request->name;
                $enquiries->email = $request->email;
                $enquiries->subject = $request->subject;
                $enquiries->mobile = $request->mobile;
                $enquiries->message =$request->message;
            
                $enquiries->save();
          }

          else{

            $request->validate([
                'name' => 'required|max:254',
                'email' => 'required|email',
                'mobile' => 'required|regex:/^[6-9]\d{9}$/|integer',
                'subject'=>'required',
                'message'=>'required',
               
    
            ]);
    
            $enquiries = new Enquiry;
    
            
            $enquiries->name = $request->name;
            $enquiries->email = $request->email;
            $enquiries->subject = $request->subject;
            $enquiries->mobile = $request->mobile;
            $enquiries->message =$request->message;
           
            $enquiries->save();
    
            
          }
          
        Mail::send(new DemoAdminMail($enquiries));
        Mail::send(new DemoUserMail($enquiries));
          
        return redirect('/')->with('message','Enquiry Submitted successfully')->with('status',asset('assets/icon/success.gif'));

    }

    

    
    public function membershipEnquiry(Request $request){
       
        $request->validate([
            'name' => 'required|max:254',
            'email' => 'required|email',
            'mobile' => 'required|regex:/^[6-9]\d{9}$/|integer',
            'address'=>'required',
            'yoe' => 'required',
            'job_role' => 'required',
            'image' => 'required',
            'message'=>'required',
           

        ]);

        
        $enquiries = new MembershipEnquiry;
        $enquiries->name = $request->name;
        $enquiries->email = $request->email;
        $enquiries->mobile = $request->mobile;
        $enquiries->address = $request->address;
        $enquiries->yoe = $request->yoe;
        $enquiries->job_role = $request->job_role;
        $enquiries->message = $request->message;
        $enquiries->image = ImageSave::withoutCrop($request->image,'membership','images/membership_enquiries');
        $enquiries->save();
       
        
        Mail::send(new DemoMembershipAdminMail($enquiries));
        Mail::send(new DemoMembershipUserMail($enquiries));

        return redirect('/')->with('message','Membership Enquiry Submitted successfully')->with('status',asset('assets/icon/success.gif'));



    }

    public function error(){
        return view('frontendviews.error');
    }


}
