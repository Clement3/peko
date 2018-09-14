<?php

namespace App\Http\Controllers\Admin;

use App\Newsletter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewslettersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $newsletters = Newsletter::paginate(10);
        
        return view('admin/newsletters/index', ['newsletters' => $newsletters]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Newsletter  $newsletter
     * @return \Illuminate\Http\Response
     */
    public function edit(Newsletter $newsletter)
    {
        return view('admin/newsletters/edit',[
            'newsletter' => $newsletter
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Newsletter  $newsletter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Newsletter $newsletter)
    {
        $request->validate([
            'email' => 'required|string|email|max:255',
        ]);

        $newsletter->update([
            'email' => $request->input('email'),
        ]);

        return redirect()->route('admin.newsletters.index')
        ->with('success', 'La page a été mise en jour');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Newsletter  $newsletter
     * @return \Illuminate\Http\Response
     */
    public function destroy(Newsletter $newsletter)
    {
        $newsletter->delete();
        return redirect()->route('admin.newsletters.index')
            ->with('success','la newsletter a bien été supprimée');
    }
}
