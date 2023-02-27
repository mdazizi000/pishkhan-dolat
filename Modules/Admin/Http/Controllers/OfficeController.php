<?php

namespace Modules\Admin\Http\Controllers;

use Cryptommer\Smsir\Smsir;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Modules\Site\Entities\Office;

class OfficeController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $offices=Office::query()->orderByDesc('created_at')->get();
        return view('admin::office.index',compact('offices'));
    }


    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $office=Office::query()->where('id',$id)->first();
        if (!$office){
            return  redirect()->back()->withErrors(['msg'=>'دفتر مورد نظر یافت نشد']);
        }
        return view('admin::office.show',compact('office'));
    }

    public function usersList($officeId)
    {
        $office=Office::query()->with('users')->where('id',$officeId)->first();

        return view('admin::office.users',compact('office'));
    }

    public function confirmOffice($id)
    {
        $office=Office::query()->where('id',$id)->first();
        if (!$office){
            return redirect()->back()->withErrors(['msg'=>"کاربر مورد نظر یافت نشد"]);
        }
        $password=Str::random(8);
        $office->status=Office::CONFIRMED;
        $office->username=$office->mobile;
        $office->password=Hash::make($password);
        $office->save();
        $message='عملیات با موفقیت انجام شد';
        $phone = $office->mobile;
        /**
         *
         * @required $name string
         * @required $value string
         */
        $send = smsir::Send();
        $parameters = array(
            new \Cryptommer\Smsir\Objects\Parameters('USERNAME', $office->mobile ),
            new \Cryptommer\Smsir\Objects\Parameters('PASSWORD',$password)
        ) ;
        /**
         * @required string $mobile
         * @required int $templateId
         * @required Parameters[] $parameters
         * @returns VerifyResponse
         */
        $templateId="129841";
        $send->Verify($phone,$templateId , $parameters);
        return redirect()->back()->with(['message'=>$message]);
    }

    public function rejectOffice($id)
    {
        $office=Office::query()->where('id',$id)->first();
        if (!$office){
            return redirect()->back()->withErrors(['msg'=>"کاربر مورد نظر یافت نشد"]);
        }
        $office->status=Office::REJECTED;
        $office->save();
        $phone = $office->mobile;
        /**
         *
         * @required $name string
         * @required $value string
         */
        $send = smsir::Send();
        $parameters = array(
            new \Cryptommer\Smsir\Objects\Parameters('NAME', $office->first_name.' '.$office->last_name ),
        ) ;
        /**
         * @required string $mobile
         * @required int $templateId
         * @required Parameters[] $parameters
         * @returns VerifyResponse
         */
        $templateId="293429";
        $send->Verify($phone,$templateId , $parameters);
        $message='عملیات با موفقیت انجام شد';
        $office->delete();
        return redirect()->route('offices.list')->with(['message'=>$message]);
    }
}
