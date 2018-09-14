<?php

namespace App\Http\Controllers\Admin;

use App\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::paginate(10);
        
        return view('admin/contacts/index', ['contacts' => $contacts]);
    }
   
   /**
     * Display the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */    
    public function show(Contact $contact)
    {
        return view('admin/contacts/show', ['contact' => $contact]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();

        return redirect()->route('admin.contacts.index')
            ->with('success', 'Le message a bien été supprimé.');
    }
}
