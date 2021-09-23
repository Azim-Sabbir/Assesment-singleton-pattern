<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class LoginController extends Controller
{
    public function login(Request $request)
    {
//        $json = Storage::disk('local')->get('admin.json');
        $path = 'json/admin.json';
        $admin = File::get($path);
        $jsonDecoded= json_decode($admin, true);
        foreach ($jsonDecoded as $key => $value)
        {
            if ($value['email'] == $request->email && $value['pass'] == $request->pass)
            {
                return redirect('/employees')->with(["message"=>"Welcome Mr. Admin   : ) "]);
            }
        }
        return redirect()->back()->with(["message"=>"login failed"]);
//        if ($request->email ==$jsonDecoded[0]['email'] && $request->pass == $jsonDecoded[0]['pass'])
//        {
//            return redirect('/employees')->with(["message"=>"Welcome Mr. Admin   : ) "]);
//        }
//        return redirect()->back()->with(["message"=>"login failed"]);
    }

    public function homepage()
    {
        return view('welcome');
    }
}

