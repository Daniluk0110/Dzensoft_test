<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;

class ContactController extends Controller
{
    public function submit(ContactRequest $request)
    {
        Contact::create($request->except(['_token']));
        return redirect('/')->with('success', 'Thanks! You message is send.');
    }

    public function allData()
    {
        $contacts = Contact::orderBy('id', 'desc')->get();
        return view('admin', ['contacts' => $contacts]);
    }

    public function showDetailMessage($id)
    {
        $contact = Contact::findOrFail($id);
        return view('message-detail', ['contact' => $contact]);
    }

    public function updateMessage($id)
    {
        $contact = Contact::findOrFail($id);
        return view('update-message', ['contact' => $contact]);
    }

    public function updateMessageSubmit($id, ContactRequest $request)
    {
        $contact = Contact::findOrFail($id);
        $contact->update($request->all());

        return redirect()->route('message-detail', $id)->with('success', 'Message Update!');
    }

    public function deleteMessage($id)
    {
        Contact::destroy($id);
        return redirect('/admin')->with('success', 'Message Deleted!');
    }
}
