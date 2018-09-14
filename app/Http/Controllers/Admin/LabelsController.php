<?php

namespace App\Http\Controllers\Admin;

use App\Label;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LabelsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $labels = Label::paginate(10);

        return view('admin/labels/index', ['labels' => $labels]);
    }

    /**
     * Show the form for creating a new resource.
     *@param  \App\Label  $label
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        return view('admin/labels/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        {
            $request->validate([
                'name' => 'required|string|max:191',
                'body' => 'required|string|max:200',
                'recipe' => 'required|string|max:255',
                'picture' => 'required|string|max:100'
            ]);
    
            Slider::create([
                'name' => $request->input('body'),
                'body' => $request->input('body'),
                'recipe' => $request->input('recipe'),
                'picture' => $request->input('picture')
            ]);
    
            return redirect()->route('admin.labels.index')
                ->with('success', 'Vous avez bien enregistré un nouveau label');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Label  $label
     * @return \Illuminate\Http\Response
     */
    public function edit(Label $label)
    {
        return view('admin/labels/edit', [
            'label' => $label
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Label  $label
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Label $label)
    {
        $request->validate([
            'name' => 'required|string|max:191',
            'body' => 'required|string|max:200',
            'recipe' => 'required|string|max:255',
            'active' => 'required|boolean'
        ]);

        $user->update([
            'title' => $request->input('title'),
            'body' => $request->input('body'),
            'recipe' => $request->input('recipe'),
            'is_active' => $request->input('active')
        ]);

        return view('admin/labels/index', ['label' => $label]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Label  $label
     * @return \Illuminate\Http\Response
     */
    public function destroy(Label $label)
    {
        $label->delete();

        return redirect()->route('admin.labels.index')
            ->with('success', 'Le label a bien été supprimé.');
    }
}
