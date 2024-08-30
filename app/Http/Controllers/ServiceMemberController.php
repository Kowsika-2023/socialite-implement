<?php

namespace App\Http\Controllers;
use App\Models\Service;
use App\Models\ServiceMember;
use App\Helpers\ImageSave;
use Illuminate\Http\Request;
use Log;
use Illuminate\Database\Eloquent\Builder;
 
class ServiceMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $service_members = ServiceMember::all();
        $services = Service::all();
        return view('backendviews.service_members.service_members',['service_members'=>$service_members,'services'=>$services]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $services = Service::where('status',1)->get();
        return view('backendviews.service_members.add_service_member',['services'=>$services]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $service_member = new ServiceMember();

        $request->validate([
                'name' => 'required',
                'title' => 'required',
                'description' => 'required',
                'mobile' => 'required|integer',
                'yoe' => 'required',
                'cropped_image' => 'required',   
                
           ]);
        
        
          $service_member->service_id = $request->service_id;
        
       
         $service_member->name = $request->name;
         $service_member->title = $request->title;
         $service_member->description = $request->description;
         $service_member->mobile = $request->mobile;
         $service_member->yoe = $request->yoe;
         $service_member->image = ImageSave::CroppedImageSave($request->cropped_image,'service_member','images/service_members');  
         $service_member->save();
        
         //team member count
         $service = Service::find($service_member->service_id);
         $service_member = ServiceMember::where('service_id',$service->id)->count();
         $service->team_members = $service_member;
         $service->save();
         return redirect()->route('members.index')->with('message','The Service Member saved successfully')->with('status',asset('assets/icon/success.gif'));
         
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $services = Service::all();
        $service_member=ServiceMember::find($id);
        return view('backendviews.service_members.view_service_member',['service_member'=>$service_member,'services'=>$services]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $services = Service::all();
        $service_member = ServiceMember::find($id);
        return view('backendviews.service_members.edit_service_member',['$services'=>$services,'service_member'=>$service_member]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $request->validate([
        'description' => 'required'
        ]);
        
        $service_member = ServiceMember::find($id);
        $service_member->name = $request->name;
        $service_member->title = $request->title;
        $service_member->description = $request->description;
        $service_member->yoe = $request->yoe;
        $service_member->mobile = $request->mobile;
        if($request->cropped_image){
            $path = public_path('images/service_members/'.$service_member->image);
            if(file_exists($path))
            {
                unlink($path);
            }
            $service_member->image = ImageSave::CroppedImageSave($request->cropped_image,'service_member','images/service_members');
           }
           $service_member->save();
           return redirect()->route('members.index')->with('message','The Service Member Updated successfully')->with('status',asset('assets/icon/success.gif'));
           
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service_member = ServiceMember::find($id);

        //team_members_count
        $service = Service::find($service_member->service_id);

        if(!$service){

            $path = public_path('images/service_members'.$service_member->image);
   
            if (file_exists($path)) {
    
            @unlink($path);
    
            }
            $service_member->delete();
          

        }
       else{

        $service->team_members = $service->team_members-1;
        $service->save();
        $path = public_path('images/service_members'.$service_member->image);
   
        if (file_exists($path)) {

        @unlink($path);

        }

        $service_member->delete();
        
    }
    return redirect('/dmw/service/members')->with('message','The service member deleted successfully')->with('status',asset('assets/icon/delete.gif'));

    }
    public function status($id){
        $service_member = ServiceMember::find($id);


        if ($service_member->status == 1) {

            $service_member->status = 0;
            $msg = 'Service Member has been deactivated';
           
        } else {
            $service_member->status = 1;
            $msg = 'Service Member has been activated';
           
        }

        $service_member->save();

        return redirect('/dmw/service/members')->with('message',$msg)->with('status',asset('assets/icon/success.gif'));
    }
}
