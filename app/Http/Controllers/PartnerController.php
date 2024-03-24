<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePartnerRequest;
use App\Http\Requests\UpdatePartnerRequest;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PartnerController extends Controller
{
    public function index()
    {
        $partners = Partner::all();
        return view('partner.index', compact('partners'));
    }

    public function create()
    {
        return view('partner.form');
    }

    public function store(StorePartnerRequest $request)
    {
        $partner = new Partner($request->validated());

        if ($request->hasFile('image')) {
            $path = Storage::disk('public')->put('partner', $request->file('image'));
            $partner->image = $path;
        }
        $partner->save();

        return redirect()->route('partner.index')->with('success', 'Partner created successfully!');
    }

    public function edit(Partner $partner) // Route model binding
    {
        return view('partner.form', compact('partner'));
    }

    public function update(UpdatePartnerRequest $request, Partner $partner) // Route model binding
    {
        $partner->fill($request->validated());

        if ($request->hasFile('image')) {
            $path = Storage::disk('public')->put('partner', $request->file('image'));
            $partner->image = $path;
        }
        $partner->save();

        return redirect()->route('partner.index')->with('success', 'Partner updated successfully!');
    }

    public function destroy(Partner $partner) // Route model binding
    {
        Storage::disk('public')->delete($partner->image);


        $partner->delete();

        // Handle image deletion if applicable (using Storage::delete())

        return redirect()->route('partner.index')->with('success', 'Partner deleted successfully!');
    }
}
