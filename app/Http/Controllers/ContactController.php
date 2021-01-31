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
        $contacts = Contact::orderBy('first_name', 'asc')->where(function ($query) {
            if ($postId = request('post_id')) {
                $query->where('post_id', $postId);
            }
        })->paginate(30);
        //$post = Post::orderBy('title')->pluck('title', 'id');
        //$contacts = Contact::orderBy('first_name', 'asc')->paginate(20);
      

        return view('contacts.index', compact('contacts', 'posts'));
    }

    public function create()
    {
        $post = Post::orderBy('title')->pluck('title', 'id')->prepend('All Post', '');
        return view('contacts.create', compact('post'));
    }

    public function store(Request $request)
    {
        dd($request->except('first_name', 'last_name'));
    }

    public function show($id)
    {
        $data = Contact::find($id);
        //return view('showContact', compact('contact'));
        return view('contacts.showContact')->withData($data);

    }
}