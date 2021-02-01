<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use App\Post;
use Auth;

class ContactController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }
    public function index()
    {
        $user = auth()->user();
        //$companies = $user->companies()->orderBy('name')->pluck('name', 'id')->prepend('All Companies', '')
        $posts = $user->posts()->orderBy('title')->pluck('title', 'id')->prepend('All post', '');
       // $contacts = Contact::latestFirst()->filter()->paginate(30);
        $contacts = $user->contacts()->latestFirst()->paginate(30);
        return view('contacts.index', compact('contacts', 'posts'));
    }

    // Show create page with options only.
    public function create()
    {
        $contact = new Contact();
        $user = auth()->user();
        $post = Post::where('user_id',$user->id)->orderBy('title')->select('id','title')->get();
        return view('contacts.create', compact('post','contact'));


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

        $request->user()->contacts()->create($request->all());

        return redirect()->route('contacts.index')->with('message', "Contact has been added successfully");
   
    
    }

    public function edit($id)
    {
        $contact = Contact::findOrFail($id);
        $post = auth()->user()->posts()->orderBy('title')->pluck('title', 'id')->prepend('All Post', '');

        return view('contacts.edit', compact('post', 'contact'));
    }

    public function update($id, Request $request)
    {
        //dd($request->user());
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