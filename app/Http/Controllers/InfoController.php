<?php

namespace App\Http\Controllers;

use App\Http\Requests\InfoRequest;
use App\Models\Info;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class InfoController extends Controller
{
    /**
     * Display the form to edit info.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Info $info)
    {
        return view('info.edit', compact('info'));
    }

    /**
     * Update the info record.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(InfoRequest $request, Info $info)
    {

        $info->update($request->all());

        return redirect()->route('info.edit', ['info' => $request->get('language')])->with('success', 'Info updated successfully!');
    }

    function resolveArrayVariables(Info &$info): void
    {
        $info->contact_fax = is_array($info->contact_fax) ? implode(', ', $info->contact_fax) : $info->contact_fax;
        $info->contact_phone = is_array($info->contact_phone) ? implode(', ', $info->contact_phone) : $info->contact_phone;
        $info->contact_email = is_array($info->contact_email) ? implode(', ', $info->contact_email) : $info->contact_email;
    }
}
