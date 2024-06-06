<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Room;

use App\Models\Gallary;

use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {

        // if (Auth::id()) {
        //     $usertype = Auth::user()->role->value;

        //     if (!$usertype == 1) {
        //         $rooms = Room::all();
        //         $gallarys = Gallary::all();

        //         return view('home', [
        //             'rooms' => $rooms,
        //             'gallarys' => $gallarys,
        //         ]);
        //     } else if ($usertype == 1) {

        //         $rooms = Room::all();
        //         $gallarys = Gallary::all();
        //         return view('home', [
        //             'rooms' => $rooms,
        //             'gallarys' => $gallarys,
        //         ]);
        //     } else {
        //         $rooms = Room::all();

        //         $gallarys = Gallary::all();

        //         return view('home', [
        //             'rooms' => $rooms,
        //             'gallarys' => $gallarys,
        //         ]);
        //     }
        // }

        $rooms = Room::all();

        $gallarys = Gallary::all();

        return view('home', [
            'rooms' => $rooms,
            'gallarys' => $gallarys,
        ]);
    }
}
