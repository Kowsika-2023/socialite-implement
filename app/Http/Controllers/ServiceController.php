<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Service;
use App\Models\ServiceMember;
use App\Helpers\ImageSave;
use Log;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $services = Service::all();
        return view('backendviews.services.services',['services'=>$services]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backendviews.services.add_service');
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
            'name' => 'required|unique:services,name|min:3|max:255',
            'cropped_image'=>'required',
            'description'=>'required|max:255',


        ]);

        $service = new Service;
        $service->name = $request->name;
        $service->description = $request->description;
        $service->image = ImageSave::CroppedImageSave($request->cropped_image,'service','images/services');
        $service->slug_name=Str::slug($request->name);   
        $service->team_members = 0;
        $service->save();
    
        return redirect('/dmw/services')->with('message','The Service saved successfully')->with('status',asset('assets/icon/success.gif'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $service = Service::find($id);
        return view('backendviews.services.view_service',['service'=>$service]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $service = Service::find($id);
        return view('backendviews.services.edit_service',['service'=>$service]);
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
            'description' => 'required|max:255',
        ]);

        $service=Service::find($id); 
        $service->name = $request->name;
        $service->description = $request->description;
        $service->slug_name=Str::slug($request->name);
        if($request->cropped_image){
        $path = public_path('images/services/'.$service->image);
          if(file_exists($path))
          {
            unlink($path);
          }
        $service->image = ImageSave::CroppedImageSave($request->cropped_image,'service','images/services');
        }           
      
        $service->save();
      
        return redirect('/dmw/services')->with('message','The Service Updated successfully')->with('status',asset('assets/icon/success.gif'));

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    
        $service = Service::find($id);
      
    
        $path = public_path('images/services'.$service->image);
       
        if (file_exists($path)) {
          @unlink($path);
        }
        $service->delete();
        return redirect('/dmw/services')->with('message','The service deleted successfully')->with('status',asset('assets/icon/delete.gif'));
            
        
    }

    public function status($id)
    {
        $service = Service::find($id);


        if ($service->status == 1) {

            $service->status = 0;
            $msg = 'Service has been deactivated';

           
        } else {
            $service->status = 1;
            $msg = 'Service has been activated';
           
        }

        $service->save();

        return redirect('/dmw/services')->with('message',$msg)->with('status',asset('assets/icon/success.gif'));
        
    }
}