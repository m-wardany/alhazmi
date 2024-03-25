<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSettingRequest;
use App\Http\Requests\UpdateSettingRequest;
use App\Models\Setting;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $settings = Setting::whereIn('key', [
            Setting::CONTACT_PHONES,
            Setting::CONTACT_MOBILES,
            Setting::CONTACT_EMAILS,
            Setting::CONTACT_FAX,
            Setting::CONTACT_WHATSAPP_URL,
        ])->get();

        return view('setting.index', compact('settings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $settings = Setting::whereIn('key', [
            Setting::CONTACT_PHONES,
            Setting::CONTACT_MOBILES,
            Setting::CONTACT_EMAILS,
            Setting::CONTACT_FAX,
            Setting::CONTACT_WHATSAPP_URL,
        ])->get();

        [$contactPhones, $contactMobiles, $contactEmails, $contactFax, $whatsapp] = [
            $settings->firstWhere('key', Setting::CONTACT_PHONES),
            $settings->firstWhere('key', Setting::CONTACT_MOBILES),
            $settings->firstWhere('key', Setting::CONTACT_EMAILS),
            $settings->firstWhere('key', Setting::CONTACT_FAX),
            $settings->firstWhere('key', Setting::CONTACT_WHATSAPP_URL),
        ];
        return view('setting.form', compact('contactPhones', 'contactMobiles', 'contactEmails', 'contactFax', 'whatsapp'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSettingRequest $request)
    {
        $settings = Setting::whereIn('key', [
            Setting::CONTACT_PHONES,
            Setting::CONTACT_MOBILES,
            Setting::CONTACT_EMAILS,
            Setting::CONTACT_FAX,
            Setting::CONTACT_WHATSAPP_URL,
        ])->get();

        foreach ($settings as $setting) {
            if ($request->get($setting->key)) {
                $setting->value = $request->get($setting->key);
                $setting->save();
            }
        }
        return redirect()->route('setting.index')->with('success', 'Settings Saved successfully!');

    }

    /**
     * Display the specified resource.
     */
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Setting $setting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSettingRequest $request, Setting $setting)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Setting $setting)
    {
        //
    }
}
