<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Modules\Admin\Entities\Admin;
use Modules\Admin\Http\Requests\AdminRequest;
use Modules\Admin\Http\Requests\EditAdminRequest;
use Modules\Admin\Http\Requests\LoginRequest;
use Modules\Site\Entities\Contact;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $admins = Admin::query()->orderByDesc('created_at')->get();
        return view('admin::index', compact('admins'));
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
    public function store(AdminRequest $request)
    {
        $admin = new Admin();
        $admin->email = $request->email;
        $admin->name = $request->name;
        $admin->phone = $request->phone;
        $admin->password = Hash::make($request->password);
        $admin->save();
        $message = ['error' => 0, 'message' => 'عملیات با موفقیت انجام شد', 'color' => 'success'];
        return redirect()->back()->with($message);

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
        $data = Admin::where('id', $id)->first();
        return view('admin::edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(EditAdminRequest $request, $id)
    {
        $admin = Admin::where('id', $id)->first();
        if (!$admin){
            $message = ['error' => 1, 'message' => 'مدیر مورد نظر یافت نشد', 'color' => 'danger'];
            return redirect()->back()->with($message);
        }
        $admin->name = $request->name;
        $admin->phone = $request->phone;
        if ($request->password !== null){
            $admin->password = Hash::make($request->password);
        }
        $admin->save();
        $message = ['error' => 0, 'message' => 'عملیات با موفقیت انجام شد', 'color' => 'success'];
        return redirect()->route('admins.index')->with($message);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $data = Admin::where('id', $id)->first();
        if ($data) {
            $data->delete();
            $message = ['error' => 0, 'message' => 'عملیات با موفقیت انجام شد', 'color' => ''];
        }
        else{
            $message = ['error' => 1, 'message' => 'ادمین مورد نظر یافت نشد', 'color' => ''];

        }
        return redirect()->back()->with($message);
    }

    public function loginPage()
    {
        return view('login');
    }

    public function login(LoginRequest $request)
    {
        $credentials = ['email' => $request->email, 'password' => $request->password];

        try {

            if (Auth::guard('admin')->attempt($credentials)) {
                $admin = Admin::where(['email' => $request->email])->first();
                Auth::guard('admin')->login($admin);
                $message = ['error' => 0, 'message' => 'ورود با موفقیت انجام شد', 'color' => 'success'];

                return redirect()->route('dashboard')->with($message);
            } else {
                $message = 'اطلاعات وارد شده صحیح نیست';
                return redirect()->back()->withErrors($message)->withInput();
            }

        } catch (\Exception $e) {
            // dd($e);
            $message = 'خطایی رخ داد مجددا تلاش کنید';
            return redirect()->back()->withErrors($message)->withInput();
        }
    }

    public function dashboard()
    {
        return view('admin::dashboard');
    }


    public function contactMessages()
    {
        $data=Contact::query()->orderByDesc('created_at')->get();
         return view('admin::contact.contact',compact('data'));
    }

    public function contactShow($id)
    {
        $data=Contact::query()->where('id',$id)->first();
         return view('admin::contact.show',compact('data'));
    }

}
