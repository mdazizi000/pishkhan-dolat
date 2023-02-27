<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use Modules\Admin\Entities\Banner;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $banners=Banner::query()->orderByDesc('created_at')->get();
        return view('admin::banners.index',compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('admin::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $rules=[
            'title'=>'required|min:3',
            'image'=>'required|image'
        ];
        $messages=[
            'title.required'=>'عنوان الزامی می باشد',
            'image.required'=>'عکس تبلیغ الزامی می باشد',
            'image.image'=>'عکس  مغتبر نمی باشد',
            'title.min'=>'عنوان نمی تواند کمتر از 3 کاراکتر باشد',

        ];
        $validate=$request->validate($rules,$messages);
        $image=$request->image;
        $name=$image->hashName();
        $path='/images/banners/';
        Storage::putFileAs($path,$image,$name);
        $data=[
          'title'=>$request->title,
          'link'=>$request->link,
          'active'=> (bool)$request->active,
          'image'=>$path.''.$name
        ];
        Banner::query()->create($data);

        return redirect()->back()->with(['message'=>'عملیات با موفقیت انجام شد']);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('admin::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $banner=Banner::query()->where('id',$id)->first();
        if (!$banner){
            return  redirect()->back()->withErrors(['msg'=>'بنر مورد نظر یافت نشد']);
        }
        return view('admin::banners.edit',compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $data=Banner::query()->where('id',$id)->first();
        if (!$data){
            return redirect()->back()->withErrors(['msg'=>'مقاله مورد نظر یافت نشد']);
        }
        $rules=[
            'title'=>'required|min:3',
            'image'=>'image'
        ];
        $messages=[
            'title.required'=>'عنوان الزامی می باشد',
            'image.image'=>'عکس  مغتبر نمی باشد',
            'title.min'=>'عنوان نمی تواند کمتر از 3 کاراکتر باشد',

        ];
        $validate=$request->validate($rules,$messages);
        if ($request->image){
            Storage::delete($data->image);
            $image=$request->image;
            $name=$image->hashName();
            $path='/images/banners/';
            Storage::putFileAs($path,$image,$name);
            $data->image=$path.''.$name;
        }
        $data->title=$request->title;
        $data->link=$request->link;
        $data->active=(bool)$request->active;
        $data->save();

        return  redirect()->route('banners.index')->with(['message'=>'عملیات با موفقیت انجام شد']);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
