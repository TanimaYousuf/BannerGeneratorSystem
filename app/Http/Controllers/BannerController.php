<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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
        return view('backend.banners.list',compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.banners.create');
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
            'title' => 'required|max:100'
        ]);

        $banner = new Banner();
        $banner->title = $request->title;
        $banner->save();

        $images = [];
        if($request->images != null){
            $images = $request->images;
        }

        $links = [];
        if($request->links != null){
            $links = $request->links;
        }

        $count = max(count($images),count($links));

        $products = [];
        $files = $request->file('images');
        for($i=0; $i < $count; $i++){
            if(isset($request->links[$i])){
                if((isset($request->prices[$i])) && (isset($request->custom_titles[$i]))){
                    array_push($products,['banner_id' => $banner->id,'link' => $request->links[$i], 'price' => $request->prices[$i], 'custom_title' => $request->custom_titles[$i]]);
                }
            }
            elseif(isset($files[$i])){
                $file_name = $files[$i]->getClientOriginalName();
                $destination_path = public_path('backend/uploads/banners/'.$banner->id);
                $files[$i]->move($destination_path, $file_name);
                if((isset($request->prices[$i])) && (isset($request->custom_titles[$i]))){
                    array_push($products,['banner_id' => $banner->id,'file_name' => $file_name, 'price' => $request->prices[$i], 'custom_title' => $request->custom_titles[$i]]);
                }
            }
        }

        if(count($products) > 0){
            DB::table('products')->insert($products);
        }
        session()->flash('success','Banner has been created!');
        return redirect()->route('banners.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $banner = Banner::with('products')->find($id);
        $banner->clicks = $banner->clicks+1;
        $banner->save();
        return view('backend.banners.view',compact('banner'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $banner = Banner::with('products')->find($id);
        $banner->clicks = $banner->clicks+1;
        $banner->save();
        return view('backend.banners.edit',compact('banner'));
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
            'title' => 'required|max:100',
        ]);

        $banner = Banner::with('products')->find($id);
        $banner->title = $request->title;
        $banner->save();

        $images = [];
        $ext_images = [];
        $links = [];
        $ext_links = [];
        if($request->images != null){
            $images = $request->images;
        }
        if($request->ext_images != null){
            $ext_images = $request->ext_images;
        }
        if($request->links != null){
            $links = $request->links;
        }
        if($request->ext_links != null){
            $ext_links = $request->ext_links;
        }
    
        $count = max(count($images),count($links),count($ext_links),count($ext_images));

        $ext_files = $request->file('ext_images');
        $files = $request->file('images');
        $products = [];

        for($i=0; $i < $count; $i++){
            if((isset($productIds[$i])) && (isset($request->ext_links[$i]))){
                if((isset($request->ext_prices[$i])) && (isset($request->ext_custom_titles[$i]))){
                    DB::table('products')->where('id',$productIds[$i])->update(['link' => $request->ext_links[$i], 'price' => $request->ext_prices[$i], 'custom_title' => $request->ext_custom_titles[$i]]);
                }
            }elseif((isset($productIds[$i])) && (isset($ext_files[$i]))){
                $file_name = $ext_files[$i]->getClientOriginalName();
                $destination_path = public_path('backend/uploads/banners/'.$banner->id);
                $ext_files[$i]->move($destination_path, $file_name);
                if((isset($request->ext_prices[$i])) && (isset($request->ext_custom_titles[$i]))){
                    DB::table('products')->where('id',$productIds[$i])->update(['file_name' => $file_name, 'price' => $request->ext_prices[$i], 'custom_title' => $request->ext_custom_titles[$i]]);
                }
            }
            if(isset($request->links[$i])){
                if((isset($request->prices[$i])) && (isset($request->custom_titles[$i]))){
                    array_push($products,['banner_id' => $id,'link' => $request->links[$i], 'price' => $request->prices[$i], 'custom_title' => $request->custom_titles[$i]]);
                }
            }
            elseif(isset($files[$i])){
                $file_name = $files[$i]->getClientOriginalName();
                $destination_path = public_path('backend/uploads/banners'.$banner->id);
                $files[$i]->move($destination_path, $file_name);
                if((isset($request->prices[$i])) && (isset($request->custom_titles[$i]))){
                    array_push($products,['banner_id' => $id,'file_name' => $file_name, 'price' => $request->prices[$i], 'custom_title' => $request->custom_titles[$i]]);
                }
            }
        }

        if(count($products) > 0){
            DB::table('products')->insert($products);
        }
        session()->flash('success','Banner has been updated!');
        return redirect()->route('banners.index');

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
        if(!is_null($banner)){
            $banner->delete();
            Product::where('banner_id',$id)->delete();
        }
        session()->flash('success','Banner has been deleted!');
    }

}
