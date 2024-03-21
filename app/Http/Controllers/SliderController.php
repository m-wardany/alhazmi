<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSliderRequest;
use App\Http\Requests\UpdateSliderRequest;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::all();
        return view('slider.index', compact('sliders'));
    }

    public function create()
    {
        return view('slider.form');
    }

    public function store(StoreSliderRequest $request)
    {
        $slider = new Slider($request->validated());

        if ($request->hasFile('image')) {
            $path = Storage::disk('public')->put('slider', $request->file('image'));
            $slider->image = $path;
        }
        $slider->save();

        return redirect()->route('slider.index')->with('success', 'Slider created successfully!');
    }

    public function edit(Slider $slider) // Route model binding
    {
        return view('slider.form', compact('slider'));
    }

    public function update(UpdateSliderRequest $request, Slider $slider) // Route model binding
    {
        $slider->fill($request->validated());

        if ($request->hasFile('image')) {
            $path = Storage::disk('public')->put('slider', $request->file('image'));
            $slider->image = $path;
        }
        $slider->save();

        return redirect()->route('slider.index')->with('success', 'Slider updated successfully!');
    }

    public function destroy(Slider $slider) // Route model binding
    {
        Storage::disk('public')->delete($slider->image);


        $slider->delete();

        // Handle image deletion if applicable (using Storage::delete())

        return redirect()->route('slider.index')->with('success', 'Slider deleted successfully!');
    }
}
