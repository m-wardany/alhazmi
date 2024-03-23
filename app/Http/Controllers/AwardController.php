<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAwardRequest;
use App\Http\Requests\UpdateAwardRequest;
use App\Models\Award;
use Illuminate\Support\Facades\Storage;

class AwardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $awards = Award::all();
        return view('award.index', compact('awards'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('award.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAwardRequest $request)
    {

        $award = new Award($request->validated());

        if ($request->hasFile('image')) {
            $path = Storage::disk('public')->put('awards', $request->file('image'));
            $award->image = $path;
        }
        $award->save();

        return redirect()->route('award.index')->with('success', 'Award created successfully!');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Award $award)
    {
        return view('award.form', compact('award'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAwardRequest $request, Award $award)
    {
        $award->fill($request->validated());

        if ($request->hasFile('image')) {
            $path = Storage::disk('public')->put('awards', $request->file('image'));
            $award->image = $path;
        }
        $award->save();

        return redirect()->route('award.index')->with('success', 'Award updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Award $award)
    {
        Storage::disk('public')->delete($award->image);


        $award->delete();


        return redirect()->route('award.index')->with('success', 'award deleted successfully!');

    }
}
