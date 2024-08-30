<?php

namespace App\Http\Controllers;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins=Admin::all();
        return view('backendviews.admins.admins',['admins'=>$admins]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backendviews.admins.add_admin');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:255',
            'user_name' => 'required|unique:admins,user_name|min:3|max:255',
            'email' => 'required|max:255',
            'password' => 'required|min:6',
            'confirm_password'=>'required|same:password',
            'mobile'=>'required|integer',

        ]);


        $admin = new Admin;
        $admin->name = $request->name;
        $admin->user_name = $request->user_name;
        define( "user_name" , $request->user_name);
        $admin->email = $request->email;
        $admin->password = Hash::make($request->password);
        $admin->mobile = $request->mobile;


        $admin->save();

        return redirect('/dmw/admins')->with('message', 'The Admin Saved Sucessfully')->with('status', asset('assets/icon/success.gif'));;
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $admin =Admin::find($id);
        return view('backendviews.admins.view_admin',['admin'=>$admin]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $admin = Admin::find($id);
      return view('backendviews.admins.edit_admin',['admin'=>$admin]);
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
            'user_name' => 'required|max:255|min:3|unique:admins,user_name,'.$id,
            'password' ,
            'confirm_password'=>'same:password',
         
       ]);

        $admin=Admin::find($id);
        $admin->name = $request->name;
        $admin->user_name = $request->user_name;
        $admin->email = $request->email;
        $admin->mobile = $request->mobile;
        if($request->password){
            $admin->password = Hash::make($request->password);
        }        

        $admin->save();
        return redirect('/dmw/admins')->with('message', 'The Admin updated Sucessfully')->with('status', asset('assets/icon/success.gif'));;
   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $admin = Admin::find($id);
        $admin->delete();
        return redirect('/dmw/admins')->with('message','The Admin deleted successfully')
        ->with('status', asset('assets/icon/success.gif'));
 
    }

    public function status($id){

        $admin = Admin::find($id);
        if($admin->status == 1){
            $admin->status = 0;
            $msg = 'Admin has been deactivated';
    
        }
        else{
            $admin->status=1;
            $msg = 'Admin has been activated';
    
        }
        $admin->save();
        return redirect('/dmw/admins')->with('message', $msg)
        ->with('status', asset('assets/icon/success.gif'));
    }
}
