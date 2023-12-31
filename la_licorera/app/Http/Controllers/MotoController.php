<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MotoController extends Controller
{
    public function index(Request $request)
    {
        $viewData = [];
        $viewData['title'] = __('moto.title');
        $viewData['subtitle'] = __('moto.subtitle');

        $url = 'http://moto-hub.tech/api/motorcycles';

        $json = json_decode(file_get_contents($url),true);
        
        $viewData['json'] = $json;
        
        return view('moto.index')->with('viewData', $viewData);
    }
}
