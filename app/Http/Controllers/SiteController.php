<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Site;
use GuzzleHttp\Client;

class SiteController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $client = new Client();
        
        $site_ar_data = Site::where('lang','=','0')->get();
        $site_en_data = Site::where('lang','=','1')->get();

        $site_data = array(
            "ar"=>$site_ar_data,
            "en"=>$site_en_data
        );
        // dd($site_data);
        return $site_data;
        
        // return view('welcome');
    }

}
