<?php

namespace App\Http\Controllers\Admin;

use App\Variety;
use App\Category;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VarietiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $varieties = Varietes::paginate(10);

        return view('admin/varieties/index', ['varieties' => $varieties]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/varieties/create', ['varieties' => $varieties]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Variety  $variety
     * @return \Illuminate\Http\Response
     */
    public function show(Variety $variety)
    {
        return view('admin/varieties/show', ['varieties' => $varieties]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Variety  $variety
     * @return \Illuminate\Http\Response
     */
    public function edit(Variety $variety)
    {
        return view('admin/varieties/edit', [
            'varieties' => $varieties,
            'categories' => Category::all()
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Variety  $variety
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Variety $variety)
    {
        return view('admin/varieties/update', ['varieties' => $varieties]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Variety  $variety
     * @return \Illuminate\Http\Response
     */
    public function destroy(Variety $variety)
    {
        $variety->delete();

        return redirect()->route('admin.varieties.index');
    }
}
