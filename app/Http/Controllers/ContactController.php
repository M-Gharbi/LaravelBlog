<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use App\Post;

class ContactController extends Controller
{
    public function index()
    {
        $post = Post::orderBy('title')->pluck('title', 'id');
        $contacts = Contact::orderBy('first_name', 'asc')->paginate(20);
       // $contacts = auth()->user()->contacts()->with('post')->latestFirst()->paginate(10);

        return view('contacts.index', compact('contacts'));
    }

    public function create()
    {
        return view('create');
    }

    public function show($id)
    {
        $data = Contact::find($id);
        //return view('showContact', compact('contact'));
        return view('contacts.showContact')->withData($data);

    }
}