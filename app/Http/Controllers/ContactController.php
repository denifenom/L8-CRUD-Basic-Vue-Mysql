<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Contact;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ContactController extends Controller
{
     /**
     * index
     *
     * @return void
     */
    public function index()
    {
        //get all posts from database
        $contact = Contact::latest()->get();

        //render with data "posts"
        return Inertia::render('Contact/Index', [
            'concts' => $contact
        ]);
    }

    /**
     * create
     *
     * @return void
     */
    public function create()
    {
        return Inertia::render('Contact/Create');
    }
    
    /**
     * store
     *
     * @param  mixed $request
     * @return void
     */
    public function store(Request $request)
    {
        //set validation
        $request->validate([
            'name'   => 'required',
            'phone' => 'required',
        ]);

        //create post
        $post = Contact::create([
            'name'     => $request->name,
            'phone'   => $request->phone
        ]);

        if($post) {
            return Redirect::route('contact.index')->with('message', 'Data Berhasil Disimpan!');
        }
    }

    /**
     * edit
     *
     * @param  mixed $post
     * @return void
     */
    public function edit(Contact $contact)
    {
        return Inertia::render('Contact/Edit', [
            'post' => $contact
        ]);
    }
    
    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $post
     * @return void
     */
    public function update(Request $request, Contact $post)
    {
        //set validation
        $request->validate([
            'name'   => 'required',
            'phone' => 'required',
        ]);

        //update post
        $post->update([
            'name'     => $request->name,
            'phone'   => $request->phone
        ]);

        if($post) {
            return Redirect::route('contact.index')->with('message', 'Data Berhasil Diupdate!');
        }
    }

    /**
     * destroy
     *
     * @param  mixed $id
     * @return void
     */
    public function destroy($id)
    {
        //find post by ID
        $post = Contact::findOrfail($id);

        //delete post
        $post->delete();

        if($post) {
            return Redirect::route('contact.index')->with('message', 'Data Berhasil Dihapus!');
        }

    }
}
