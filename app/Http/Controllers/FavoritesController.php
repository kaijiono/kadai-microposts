<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FavoritesController extends Controller
{
    public function store(Request $request, $id)
    {
        \Auth::user()->favorite($id);
        return redirect()->back();
    }
    public function destroy($id)
    {
        \Auth::user()->unfavorite($id);
        return redirect()->back();
    }
    public function favorites()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $favorite_microposts = $user->favorites()->paginate(10);

            $data = [
                'user' => $user,
                'microposts' => $favorite_microposts,
            ];
        $data += $this->counts($user);
            return view('users.show', $data);
        }else {
            return view('welcome');
        }
    }
}
