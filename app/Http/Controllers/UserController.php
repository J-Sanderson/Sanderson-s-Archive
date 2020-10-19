<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {

        $users = User::orderBy('name', 'asc')->where('email_verified_at', '<>', null)->get();

        return view('users.index', [
            'users' => $users
        ]);
    }

    public function show($id) {

        $user = User::findOrFail($id);

        $images = $user->images()->latest()->paginate(15);

        return view('users.show', [
            'user' => $user,
            'images' => $images
        ]);
    }

    public function update(Request $request, $id) {
        
        $user = User::findOrFail($id);
        $user->showEmail = $request->showEmail === 'on';
        $user->bio = $request->bio;
        $user->website = $request->website;
        $user->save();
        return redirect(route('users.show', Auth::id()));
    }

    public function destroy($id) {

        $user = User::findOrFail($id);

        if ($user['id'] === Auth::id()) {
            $images = $user->images;
            foreach($images as $image) {
                Storage::delete('public/'.$image->url);
                $image->delete();
            }
            $user->delete();
            return redirect(route('users.index'));
        } else {
            abort(403);
        }

    }
}
