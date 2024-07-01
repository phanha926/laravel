<?php

namespace App\Http\Controllers;
use App\Models\Test;
use Illuminate\Http\Request;

class Studentcontroller extends Controller
{
    public function list(){
        $test = Test::all();
        return view('list')-> with('test' , $test);
    }
}
