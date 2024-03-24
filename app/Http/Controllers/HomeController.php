<?php

namespace App\Http\Controllers;

use App\Http\Resources\AwardResource;
use App\Http\Resources\BranchResource;
use App\Http\Resources\InfoResource;
use App\Http\Resources\ProductResource;
use App\Http\Resources\SliderResource;
use App\Http\Resources\SocialMediaResource;
use App\Models\Award;
use App\Models\Branch;
use App\Models\Info;
use App\Models\Product;
use App\Models\Setting;
use App\Models\Slider;
use App\Models\SocialMedia;
use App\Services\GetHomeDetail;
use App\Site;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;

class HomeController extends Controller
{


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return response()->json((new GetHomeDetail)->execute());
    }


    function downloadCatalogue(): ?StreamedResponse
    {
        $catalogue = Setting::firstWhere('key', Setting::CATALOGUE_URL);
        if (!empty (data_get($catalogue, 'value'))) {
            return Storage::disk('public')->download($catalogue->value, 'Alhazemi-Catalogue.pdf');
        }
        return null;
    }
}
