<?php

namespace App\Http\Controllers\Admin;

use App\Parameter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ParametersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parameters = [
            'app_title' => Parameter::where('meta', 'app_title')->first(),
            'app_description' => Parameter::where('meta', 'app_description')->first()
        ];

        return view('admin/parameter', $parameters);
    }

    /**
     * Update the all parameters.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
    }
}
