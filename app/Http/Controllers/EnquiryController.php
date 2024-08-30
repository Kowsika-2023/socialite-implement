<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servicemember;
use App\Models\Enquiry;

class EnquiryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $active_enquiries = Enquiry::whereNull('service_member_id')->where('status',1)->get();
        $deactive_enquiries = Enquiry::whereNull('service_member_id')->where('status',0)->get();

        return view('backendviews.enquiries.enquiries',['active_enquiries'=>$active_enquiries,'deactive_enquiries'=>$deactive_enquiries]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $enquiry = Enquiry::find($id);
        return view('backendviews.enquiries.view_enquiry',['enquiry'=>$enquiry]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $enquiry = Enquiry::find($id);
        $enquiry->delete();
        return redirect('/dmw/enquiries')->with('message','The Enquiry deleted Successfully')->with('status',asset('assets/icon/delete.gif'));
  
    }
    public function status(Request $request, $id)
    {
        $enquiry = Enquiry::find($id);


        if ($enquiry->status == 1) {

            $enquiry->status = 0;
            $msg = 'Enquiry has been deactivated';
           
        } else {
            $enquiry->status = 1;
            $msg = 'Enqiry has been deactivated';
           
        }

        $enquiry->save();

        return redirect('/dmw/enquiries')->with('message',$msg)->with('status',asset('assets/icon/success.gif'));
     
    
    }

    public function activeEnquiryShow(){

             $active_enquiry = Enquiry::find($id);
    
             if($active_enquiry->satatus == 1){
               return view('backendviews.enquiries.view_enquiry',['active_enquiry'=>$active_enquiry]);
        
            }
        }

 public function deactiveEnquiryShow(){

         $deactive_enquiry = Enquiry::find($id);

         if($deactive_enquiry->satatus == 1){

           
          return view('backendviews.enquiries.view_enquiry',['deactive_enquiry'=>$deactive_enquiry]);
    
    }

        }


public function showEnquiry($id){
    $enquiry = Enquiry::find($id);
    return view('backendviews.enquiries.view_enquiry',['enquiry'=>$enquiry]);
}




}