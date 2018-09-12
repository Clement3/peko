<?php

namespace App\Http\Controllers\Admin;

use App\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SlidersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::paginate(10);

        return view('admin/sliders/index', ['sliders' => $sliders]);
    }

    /**
     * Show the form for creating a new resource.
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/sliders/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:191',
            'body' => 'required|string|max:200',
            'active' => 'required|boolean'
        ]);

        Slider::create([
            'title' => $request->input('title'),
            'body' => $request->input('body'),
            'picture' => 'tgg-hybyyb'
        ]);

        return redirect()->route('admin.sliders.index')
            ->with('success', 'Vous avez bien enregistré un nouveau slider');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */    
    public function show(Slider $slider)
    {
        return view('admin/sliders/show', ['slider' => $slider]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider)
    {
        return view('admin/sliders/edit', [
            'slider' => $slider,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $slider)
    {
        $request->validate([
            'title' => 'required|string|max:191',
            'body' => 'required|string|max:200',
            'active' => 'required|boolean'
        ]);

        $user->update([
            'title' => $request->input('title'),
            'body' => $request->input('body'),
            'is_active' => $request->input('active')
        ]);
        return redirect()->route('admin.sliders.show', ['slider' => $slider]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    
        {
            $slider->delete();
    
            return redirect()->route('admin.sliders.index')
                ->with('success', 'Le slider a bien été supprimé.');
        }
    
}
