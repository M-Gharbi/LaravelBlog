<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use App\Post;

class ContactController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('title')->pluck('title', 'id')->prepend('All post', '');
       // $contacts = Contact::latestFirst()->filter()->paginate(10);
        $contacts = Contact::latestFirst()->paginate(30);
        return view('contacts.index', compact('contacts', 'posts'));
    }

    public function create()
    {
        $contact = new Contact();
        $post = Post::orderBy('title')->pluck('title', 'id')->prepend('All Post', '');

        return view('contacts.create', compact('post', 'contact'));


    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'post_id' => 'required|exists:posts,id',
        ]);

        Contact::create($request->all());

        return redirect()->route('contacts.index')->with('message', "Contact has been added successfully");
   
    
    }

    public function edit($id)
    {
        $contact = Contact::findOrFail($id);
        $post = Post::orderBy('title')->pluck('title', 'id')->prepend('All Post', '');

        return view('contacts.edit', compact('post', 'contact'));
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'post_id' => 'required|exists:posts,id',
        ]);

        $contact = Contact::findOrFail($id);
        $contact->update($request->all());

        return redirect()->route('contacts.index')->with('message', "Contact has been updated successfully");
    }

    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return back()->with('message', "Contact has been deleted successfully");
    }


    public function show($id)
    {
        $data = Contact::findOrFail($id);
        return view('contacts.showContact')->withData($data);

    }
}