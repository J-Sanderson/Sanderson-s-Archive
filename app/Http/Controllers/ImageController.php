<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = Image::latest()->get();
        return view('images.index', [
            'images' => $images
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('images.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // TODO validate all this
        // TODO allow multi-line descriptions

        $path = $request->image->store('public/images');

        $url = explode('/', $path);
        array_shift($url);
        $url = implode('/', $url);

        $image = new Image;
        $image->url = $url;
        $image->user_id = Auth::id();
        $image->desc = $request->desc ?? '';

        $image->save();

        return redirect(route('images.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function show(Image $image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $image = Image::findOrFail($id);

        if ($image['user_id'] === Auth::id()) {
            return view('images.edit', ['image' => $image]);
        } else {
            abort(403);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $image = Image::findOrFail($id);

        if ($image['user_id'] === Auth::id()) {
            $image->desc = $request->desc ?? '';
            $image->save();
            return redirect(route('users.show', Auth::id()));
        } else {
            abort(403);
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image = Image::findOrFail($id);

        if ($image['user_id'] === Auth::id()) {
            $image->delete();
            return redirect(route('users.show', Auth::id()));
        } else {
            abort(403);
        }
        
    }
}
