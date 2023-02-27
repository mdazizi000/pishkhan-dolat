<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use Modules\Content\Entities\Article;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $articles=Article::query()->orderByDesc('created_at')->get();
        return view('admin::article.article',compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('admin::article.article');
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
            'text'=>'required',
            'image'=>'required|image'
        ];
        $messages=[
            'title.required'=>'عنوان الزامی می باشد',
            'text.required'=>'متن مقاله الزامی می باشد',
            'image.required'=>'عکس مقاله الزامی می باشد',
            'image.image'=>'عکس  مغتبر نمی باشد',
            'title.min'=>'عنوان نمی تواند کمتر از 3 کاراکتر باشد',

        ];
        $validate=$request->validate($rules,$messages);
        $image=$request->image;
        $name=$image->hashName();
        $path='/images/articles/';
        Storage::putFileAs($path,$image,$name);
        $data=[
            'title'=>$request->title,
            'text'=>$request->text,
            'type'=>'1',
            'image'=>$path.''.$name,
        ];

        Article::query()->create($data);
        return  redirect()->back()->with(['message'=>'عملیات با موفقیت انجام شد']);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('content::show');
    }


    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {

        $data=Article::query()->where('id',$id)->first();
        if (!$data){
            return redirect()->back()->withErrors(['msg'=>'مقاله مورد نظر یافت نشد']);
        }
        return view('admin::article.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $data=Article::query()->where('id',$id)->first();
        if (!$data){
            return redirect()->back()->withErrors(['msg'=>'مقاله مورد نظر یافت نشد']);
        }
        $rules=[
            'title'=>'required|min:3',
            'text'=>'required',
            'image'=>'image'
        ];
        $messages=[
            'title.required'=>'عنوان الزامی می باشد',
            'text.required'=>'متن مقاله الزامی می باشد',
            'image.image'=>'عکس  مغتبر نمی باشد',
            'title.min'=>'عنوان نمی تواند کمتر از 3 کاراکتر باشد',

        ];
        $validate=$request->validate($rules,$messages);
       if ($request->image){
           Storage::delete($data->image);
           $image=$request->image;
           $name=$image->hashName();
           $path='/images/articles/';
           Storage::putFileAs($path,$image,$name);
           $data->image=$path.''.$name;
       }
        $data->title=$request->title;
        $data->text=$request->text;

        $data->save();

        return  redirect()->route('contents.index')->with(['message'=>'عملیات با موفقیت انجام شد']);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $data=Article::query()->where('id',$id)->first();
        if (!$data){
            return redirect()->back()->withErrors(['msg'=>'مقاله مورد نظر یافت نشد']);
        }

        Storage::delete($data->image);
        $data->delete();
        return  redirect()->back()->with(['message'=>'عملیات با موفقیت انجام شد']);
    }
}
