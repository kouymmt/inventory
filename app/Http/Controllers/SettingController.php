<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;


class SettingController extends Controller
{
    public function index(){
        return view('Setting.index');
    }

    public function set(Request $request, Setting $setting){
      $setting = new Setting;
      $setting->truncate();
      $setting->fill($request->all());
      $setting->save();
      
      return view('Setting.index',['set_in_db'=> $setting->first()]);
      
      
      
     }

    }
