<?php

namespace App\Http\Controllers;
use App\Site;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $client = new Client();

        $user_id = Auth::id();
        
        $site = Site::get();
        $user_data = User::find($user_id);
        // dd($user_data,$user_channels);
        $site = Site::get();
        $data = array(
            "site"=>$site,
            "user_data"=>$user_data
        );
        dd($data);

        return view('home');
    }

    public function edit($id)
    {
        $user_id = Auth::id();
        
        $site_ar = Site::where('site_id',$id)->where('lang','=','0')->get();
        $site_en = Site::where('site_id',$id)->where('lang','=','1')->get();
        $user_data = User::find($user_id);
        $data = array(
            "site"=>array(
                "ar"=>$site_ar,
                "en"=>$site_en
            ),
            "user_data"=>$user_data
        );
        return $data;
        // dd($data);
    }


    public function update($request, $id)
    {
        
        
    }
}
