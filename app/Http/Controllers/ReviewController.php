<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reviews;

class ReviewController extends Controller
{
    public function index(Reviews $Reviews)//インポートしたPostをインスタンス化して$postとして使用。
    {
        return $Reviews->get();//$postの中身を戻り値にする。
    }
}
