<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Stock\Entities\SoldStock;
use Modules\Stock\Entities\StockHolder;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $stockholders=StockHolder::query()->orderByDesc('created_at')->get();
        return view('admin::stock.index',compact('stockholders'));
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
        //
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
        $data = StockHolder::query()->where('id', $id)->first();
        return view('admin::stock.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $rules=[
            'office_code'=>'required',
            'first_name'=>'required|min:3',
            'last_name'=>'required|min:3',
            'national_code'=>'required|min:10|max:10',
            'gender'=>'required|in:1,2'
        ];
        $messages=[
            'office_code.required'=>'فیلد کد دفتر پیشخوان الزامی می باشد',
            'first_name.required'=>'نام الزامی می باشد',
            'first_name.min'=>'نام نمی تواند کمتر از 3 کاراکتر باشد',
            'last_name.required'=>'نام خانوادگی الزامی می باشد',
            'last_name.min'=>'نام خانوادگی نمی تواند کمتر از 3 کاراکتر  باشد',
            'national_code.required'=>'فیلد کد ملی الزامی می باشد',
            'national_code.min'=>'کدملی باشد 10 رقم باشد',
            'national_code.max'=>'کدملی باشد 10 رقم باشد',
            'gender.required'=>'فیلد جنسیت الزامی می باشد',
            'gender.in'=>'جنسیت وازد شده معتبر نمی باشد'
        ];
        $validate=$request->validate($rules,$messages);
        $stockholder=StockHolder::query()->where('id',$id)->first();
        if (!$stockholder){
            $message='سهامدار مورد نظر یافت نشد';
            return redirect()->route('stockholders.index')->withErrors(['msg'=>$message]);
        }
        $stockholder->office_code=$request->office_code;
        $stockholder->first_name=$request->first_name;
        $stockholder->last_name=$request->last_name;
        $stockholder->national_code=$request->national_code;
        $stockholder->phone=$request->phone;
        $stockholder->gender=$request->gender;
        $stockholder->save();
        $message='عملیات با موفقیت انجام شد';
        return redirect()->route('stockholders.index')->with(['message'=>$message]);
    }

    public function stocksIndex(Request $request)
    {
        if (\request()->has('status')){
            $stocks=SoldStock::query()->with('holder')
                ->where('main_id',null)
                ->where('status',$request->status)
                ->orderByDesc('created_at')->get();
        }
        elseif (\request()->has('national_code')){
            $stocks=SoldStock::query()->with('holder')
                ->where('main_id',null)
                ->where('national_code','==',$request->national_code)
                ->orderByDesc('created_at')->get();
        }

        elseif (\request()->has('name')){
            $stocks=SoldStock::query()->with('holder')->where('main_id',null)
                ->where('first_name','LIKE','%'.$request->name.'%')
                ->orWhere('last_name','LIKE','%'.$request->name.'%')
                ->orderByDesc('created_at')->get();
        }
        else{
            $stocks=SoldStock::query()->with('holder')
                ->where('main_id',null)
                ->orderByDesc('created_at')->get();
        }
        return view('admin::stock.list',compact('stocks'));
    }


    public function stock($id)
    {
        $stock=SoldStock::query()->with('holder','subStocks')->where('id',$id)->first();
        if (!$stock){
            $message='سهام مورد نظر یافت نشد';
            return redirect()->route('stocks.index')->withErrors(['msg'=>$message]);
        }

        return view('admin::stock.show',compact('stock'));

    }
}
