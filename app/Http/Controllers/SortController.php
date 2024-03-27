<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SortController extends Controller
{
    function sort(Request $request)
    {
        $request->validate([
            'ids' => 'required|array',
            'ids.*' => 'required|integer',
            'model' => ['required', Rule::in(['Product', 'Award', 'Partner', 'Slider'])],
        ]);
        $ids = $request->get('ids');
        $class = sprintf('\\App\\Models\\%s', $request->get('model'));
        $models = $class::all();
        foreach ($ids as $index => $id) {
            $model = $models->where('id', $id)->first();
            if ($model) {
                $model->sort = $index + 1;
                $model->save();
            }
        }
    }
}
