<?php

namespace App\Http\Controllers;
use App\Models\Banner;
use App\Helpers\ImageSave;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = Banner::all();
        return view('backendviews.banners.banners',['banners'=>$banners]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backendviews.banners.add_banner');
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
        'content' => 'required|max:500',
        'cropped_image' => 'required',
    
        ]);

        $banner = new Banner;
        $banner->content = $request->content;
        $banner->image = ImageSave::CroppedImageSave($request->cropped_image,'banner','images/banners');

        $banner->save();

        return redirect('/dmw/banners')->with('message','The Banner saved successfully')->with('status',asset('assets/icon/success.gif'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $banner = Banner::find($id);
        return view('backendviews.banners.view_banner',['banner'=>$banner]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $banner = Banner::find($id);
        return view('backendviews.banners.edit_banner',['banner'=>$banner]);
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
            'content' => 'required|max:500',
        ]);


        $banner = Banner::find($id);
       
        $banner->content = $request->content;
       
        if($request->cropped_image){
            $path = public_path('images/banners/'.$banner->image);
            if(file_exists($path))
            {
                unlink($path);
            }
            $banner->image = ImageSave::CroppedImageSave($request->cropped_image,'banner','images/banners');
           }
           
           $banner->save();

           return redirect('/dmw/banners')->with('message','The Banner updated successfully')->with('status',asset('assets/icon/success.gif'));
           ;
 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $banner = Banner::find($id);

        $path = public_path('images/banners'.$banner->image);
   
 if (file_exists($path)) {

       @unlink($path);

   }
     $banner->delete();
        return redirect('/dmw/banners')->with('message','The Banner deleted successfully')->with('status',asset('assets/icon/delete.gif'));
        
   
    }

    public function status($id)
    {
        $banner = Banner::find($id);


        if ($banner->status == 1) {

            $banner->status = 0;
            $msg = 'Banner has been deactivated';
           
        } else {
            $banner->status = 1;
            $msg = 'Banner has been activated';
           
        }

        $banner->save();

        return redirect('/dmw/banners')->with('message',$msg)->with('status',asset('assets/icon/success.gif'));
        ;
    }

}
