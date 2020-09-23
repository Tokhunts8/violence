<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactStoreRequest;
use App\Models\Contact;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(): \Illuminate\View\View
    {
        $contacts = Contact::orderBy('order');
        $count    = $contacts->count();
        $contacts = $contacts->paginate(10);
        return view('contacts.index', ['contacts' => $contacts, 'count' => $count]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create(): \Illuminate\View\View
    {
        return view("contacts.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ContactStoreRequest $request): \Illuminate\Http\RedirectResponse
    {
        $contact        = new Contact();
        $contact->text  = $request->text;
        $contact->eText = $request->eText;
        $contact->phone = $request->phone;
        $contact->order = $request->order;
        $contact->save();

        return redirect("admin/contact");
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Contact $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Contact $contact
     * @return \Illuminate\View\View
     */
    public function edit(Contact $contact): \Illuminate\View\View
    {
        return view("contacts.edit", compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Contact $contact
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ContactStoreRequest $request, Contact $contact): \Illuminate\Http\RedirectResponse
    {
        $contact->text  = $request->text;
        $contact->eText = $request->eText;
        $contact->phone = $request->phone;
        $contact->order = $request->order;
        $contact->save();

        return redirect("admin/contact");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Contact $contact
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Contact $contact): \Illuminate\Http\RedirectResponse
    {
        $contact->delete();
        return redirect()->back();
    }

}
