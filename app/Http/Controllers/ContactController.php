<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Contact;

class ContactController extends Controller
{
    public function formcontact()
    {
        return view('nous-contacter');
    }

    public function formcreate(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required', 
            'subject' => 'required', 
            'message' => 'required', 
        ]);

        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->subject = $request->subject;
        $contact->message = $request->message;

        $contact->save();

        return redirect()->route('formcontact')->with('success', 'Votre message a bien ete envoye');
    }

    public function listecontact()
    {
        $contacts = Contact::orderBy('name', 'desc')->paginate(5);
        return view('listecontact')->with('contacts', $contacts);
    }
}
