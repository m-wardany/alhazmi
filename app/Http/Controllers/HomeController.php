<?php

namespace App\Http\Controllers;

use App\Mail\ContactUsMail;
use App\Models\Setting;
use App\Services\GetHomeDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use PHPMailer\PHPMailer\PHPMailer;
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
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        Mail::to('info@alhazmie.com')->send(
            new ContactUsMail(
                name: sprintf('%s %s', $request->get('first_name'), $request->get('lasts_name')),
                email: $request->get('email'),
                message: $request->get('message')
            )
        );

        // Return a response
        return response()->json(['message' => __('Your message has been sent successfully!')]);
    }
}
