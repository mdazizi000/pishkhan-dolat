<?php

namespace Modules\Site\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Content\Entities\Article;
use Modules\Site\Entities\Contact;

class SiteController extends Controller
{

    public function content()
    {
        $contents=Article::query()->where('type',Article::ARTICLES)->orderByDesc('created_at')->paginate(5);
        return view('site::content',compact('contents'));
    }

    public function contents(Request $request)
    {
        $contents=Article::query()->where('type',$request->type)->orderByDesc('created_at')->paginate(5);
        return view('site::contents',compact('contents'));
    }

    public function contentShow($id)
    {
        $data=Article::query()->where('id',$id)->first();

        return view('site::show',compact('data'));
    }

    public function submitContent(Request $request)
    {
        $rules=[
            'name'=>'required|min:3',
            'email'=>'required|email',
            'subject'=>'required',
            'phone'=>'required|regex:/(09)[0-9]{9}/|digits:11|numeric',
            'message'=>'required'

        ];
        $messages=[
            'name.required'=>'فیلد نام الزامی می باشد',
            'email.required'=>'فیلد ایمیل الزامی می باشد',
            'email.email'=>'ایمیل معتبر نمی باشد',
            'subject.required'=>'فیلد موضوع الزامی می باشد',
            'message.required'=>'فیلد پیام الزامی می باشد',
            'name.min'=>'فیلد نام نباید کمتبر از 3 کاراکتر باشد',
            'phone.required'=>'فیلد شماره همراه الزامی می باشد',
            'phone.regex'=>'شماره همراه وارد شده معتبر نمی باشد',
            'phone.digits'=>'شماره همراه نمی تواند منتر از 11 رقم باشد',
            'phone.numeric'=>'شماره همراه معتبر نمی باشد',
            'phone.unique'=>'شماره همراه وارد شده تکراری می باشد',
        ];

        $validate=$request->validate($rules,$messages);

        $data=[
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'subject'=>$request->subject,
            'message'=>$request->message,
        ];
        Contact::query()->create($data);

        return redirect()->back()->with(['message'=>'پیام شما با موفقیت ارسال شد']);
    }


}
