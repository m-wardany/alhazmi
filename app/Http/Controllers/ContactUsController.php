<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $messages = ContactUs::paginate(20);
        return view('contact_messages.index', compact('messages'));
    }


    /**
     * Display the specified resource.
     */
    public function show(Request $request, ContactUs $contactUs)
    {
        return view('contact_messages.show', compact('contactUs'));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ContactUs $contactUs)
    {
        $contactUs->delete();

        return redirect()->route('contactus.index')->with('success', 'Message deleted successfully!');
    }
}
