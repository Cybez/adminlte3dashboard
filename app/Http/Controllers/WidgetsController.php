<?php

namespace App\Http\Controllers;
use App\Models\Widget;
use Illuminate\Http\Request;

class WidgetsController extends Controller
{
    


    public function creatWidgets(){
        return view('AdminDashboard.Widgets.widgets');
    }



}
