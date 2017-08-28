<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;

class IndexController extends CommonController
{
    public function index()
    {
        return view('admin.index');
    }
    public function main(){
        return view('admin.main');
    }
    public function datalist(){
        return view('admin.datalist');
    }
}
