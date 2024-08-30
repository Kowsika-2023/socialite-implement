<?php

namespace App\Http\Controllers;
use App\Models\Enquiry;

use Illuminate\Http\Request;

class ServiceEnquiryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $active_service_enquiries = Enquiry::whereNotNull('service_member_id')->orderBy('id', 'ASC')->where('status',1)->get();
        $deactive_service_enquiries = Enquiry::whereNotNull('service_member_id')->orderBy('id', 'ASC')->where('status',0)->get();
        
        return view('backendviews.service_enquiries.service_enquiries',['active_service_enquiries'=>$active_service_enquiries,'deactive_service_enquiries'=>$deactive_service_enquiries]);
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $service_enquiry = Enquiry::find($id);
        return view('backendviews.service_enquiries.view_service_enquiry',['service_enquiry'=>$service_enquiry]);
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
       $service_enquiry = Enquiry::find($id);
       $service_enquiry->delete();
       return redirect('/dmw/service_enquiries')->with('message','The Service Enquiry deleted successfully')->with('status',asset('assets/icon/delete.gif'));

    }

    public function status($id){
        $service_enquiry = Enquiry::find($id);


        if ($service_enquiry->status == 1) {

            $service_enquiry->status = 0;
            $msg = 'Service Enquiry has been deactivated';
           
        } else {
            $service_enquiry->status = 1;
            $msg = 'Service Enquiry has been deactivated';
           
        }

        $service_enquiry->save();

        return redirect('/dmw/service_enquiries')->with('message',$msg)->with('status',asset('assets/icon/success.gif'));
    
    }

  public function ServiceEnquiryShow($id){
      
    $service_enquiry = Enquiry::find($id);
    return view('backendviews.service_enquiries.view_service_enquiry',['service_enquiry'=>$service_enquiry]);
  }

  

}
