<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        return view('admin.index');
    }
    public function main(){
        return view('admin.main');
    }
    public function left(){
        return view('admin.left');
    }
    public function head(){
        return view('admin.head');
    }
}
