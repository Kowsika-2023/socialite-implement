<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MembershipEnquiry;

class MembershipEnquiryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $active_membership_enquiries = MembershipEnquiry::where('status',1)->get();
        $deactive_memebership_enquiries = MembershipEnquiry::where('status',0)->get();
        return view('backendviews.membership_enquiries.membership_enquiries',['active_membership_enquiries'=>$active_membership_enquiries,'deactive_membership_enquiries'=>$deactive_memebership_enquiries]);
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
        $membership_enquiry = MembershipEnquiry::find($id);
        return view('backendviews.membership_enquiries.view_membership_enquiry',['membership_enquiry'=>$membership_enquiry]);
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
        $membership_enquiry = MembershipEnquiry::find($id);
        $path = public_path('images/membership_enquiries'.$membership_enquiry->image);
   
        if (file_exists($path)) {

        @unlink($path);

        }

        $membership_enquiry->delete();
        return redirect('/dmw/membership_enquiries')->with('message','The Membership Enquiry deleted successfully')->with('status',asset('assets/icon/delete.gif'));
       
    }

    public function status($id){
        $membership_enquiry = MembershipEnquiry::find($id);


        if ($membership_enquiry->status == 1) {

            $membership_enquiry->status = 0;
            $msg = 'Membership Service Enquiry has been deactivated';
           
        } else {
            $membership_enquiry->status = 1;
            $msg = 'Membership Service Enquiry has been deactivated';
           
        }

        $membership_enquiry->save();

        return redirect('/dmw/membership_enquiries')->with('message',$msg)->with('status',asset('assets/icon/success.gif'));
    
    }
}
