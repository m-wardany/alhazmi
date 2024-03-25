<?php

namespace App\Http\Controllers;

use App\Mail\ContactUsMail;
use App\Models\Setting;
use App\Services\GetHomeDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
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

    function contact(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        // Send an email notification
        Mail::to('your-email@example.com')->send(new ContactUsMail($request->all()));

        // You can perform additional actions here, such as saving to a database

        // Return a response
        return response()->json(['message' => 'Your message has been sent successfully!']);
    }
}
