<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    public  function index(){
        return view('listings.index', [
            'listings' => Listing::latest()->
            filter(request(['tag', 'search']))->
            simplePaginate(6)
        ]);
    }

    public function show(Listing $listing){
        return view('listings.show', [
            'listing' => $listing
        ]);
    }

    public function create(){
        return view('listings.create');
    }

    public function store(Request $request){
        $formFields = $request->validate([
            'title' => 'required',
            'manufacturer' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required',
        ]);

        if($request->hasFile('image')){
            $formFields['image'] = $request->file('image')->store('imgs', 'public');
        }

        $formFields['user_id'] = auth()->id();

        Listing::create($formFields);

        return redirect('/');
    }

    public function edit(Listing $listing){
        return view('listings.edit', ['listing' => $listing]);
    }

    public function update(Request $request, Listing $listing){

        if ($listing->user_id != auth()->id()){
            abort(403, 'Unauthorized Action');
        }

        $formFields = $request->validate([
            'title' => 'required',
            'manufacturer' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required',
        ]);

        if($request->hasFile('image')){
            $formFields['image'] = $request->file('image')->store('imgs', 'public');
        }

        $listing->update($formFields);

        return redirect('/listings/'.$listing->id);
    }

    public function destroy(Listing $listing){

        if ($listing->user_id != auth()->id()){
            abort(403, 'Unauthorized Action');
        }

        $listing->delete();
        return redirect('/');
    }

    public function manage(){
        return view('listings.manage', ['listings' => auth()->user()->listings()->get()]);
    }

}
