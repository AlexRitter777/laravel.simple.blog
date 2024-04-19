<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Front\Controller;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(){




       return view('admin/index');


    }
}
