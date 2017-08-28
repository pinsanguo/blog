<?php

namespace App\Http\Controllers\Admin;
use App\Models\Nav;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;

class NavController extends Controller
{
    /**
     * index()
     *  分类列表页面
     * @return
     */
    public function index()
    {
        $categorys = (new Nav)->tree();
        return view('admin.nav.index')->with('data',$categorys);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorys = (new Nav)->tree();
        return view('admin.nav.add')->with('data',$categorys);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = Input::except('_token');
        $input['create_time'] = date("Y-m-d h:i:s");
        $rules = [
            'name'=>'required',
        ];

        $message = [
            'name.required'=>'文章标题不能为空！',
        ];

        $validator = Validator::make($input,$rules,$message);
        if($validator->passes()){
            $re = Nav::create($input);
            if($re){
                return redirect('admin/category');
            }else{
                return back()->with('errors','数据填充失败，请稍后重试！');
            }
        }else{
            return back()->withErrors($validator);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $field = Nav::find($id);
        $cate = (new Nav)->tree();
        return view('admin.nav.edit',compact('field','cate'));
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
        $input = Input::except('_token','_method');
        $re = Nav::where('id',$id)->update($input);
        if($re){
            die(json_encode(['status' => 'ok', 'msg' => '修改成功']));
        }else{
            return back()->with('errors','文章更新失败，请稍后重试！');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
