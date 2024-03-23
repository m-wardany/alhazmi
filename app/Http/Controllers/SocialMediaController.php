<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSocialMediaRequest;
use App\Http\Requests\UpdateSocialMediaRequest;
use App\Models\SocialMedia;
use Illuminate\Support\Facades\Storage;

class SocialMediaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $socialmedias = SocialMedia::all();
        return view('socialmedia.index', compact('socialmedias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('socialmedia.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSocialMediaRequest $request)
    {

        $socialmedia = new SocialMedia($request->validated());

        if ($request->hasFile('image')) {
            $path = Storage::disk('public')->put('socialmedias', $request->file('image'));
            $socialmedia->image = $path;
        }
        $socialmedia->save();

        return redirect()->route('socialmedia.index')->with('success', 'SocialMedia created successfully!');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SocialMedia $socialmedia)
    {
        return view('socialmedia.form', compact('socialmedia'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSocialMediaRequest $request, SocialMedia $socialmedia)
    {
        $socialmedia->fill($request->validated());

        if ($request->hasFile('image')) {
            $path = Storage::disk('public')->put('socialmedias', $request->file('image'));
            $socialmedia->image = $path;
        }
        $socialmedia->save();

        return redirect()->route('socialmedia.index')->with('success', 'SocialMedia updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SocialMedia $socialmedia)
    {
        Storage::disk('public')->delete($socialmedia->image);


        $socialmedia->delete();


        return redirect()->route('socialmedia.index')->with('success', 'socialmedia deleted successfully!');

    }
}
