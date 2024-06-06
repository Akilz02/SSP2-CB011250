<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.room.index', [
            'rooms' => Room::paginate(10), // Use the Room model
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.room.form', [
            'room' => new Room(), // Use the Room model
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $room = new Room();
        
        $room->room_title = $request->room_title;
        $room->description = $request->description;
        $room->price = $request->price;
        $room->wifi = $request->wifi;
        $room->room_type = $request->room_type;

        $image = $request->file('image');


        if ($image) {
            $imagename = time() . '.' . $image->getClientOriginalextension();
            $request->image->move('uploadedRooms', $imagename);
            $room->image = $imagename;
        }

        $room->save();

        return redirect()->route('room.index')->with('success', 'Room created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Room $room)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Room $room)
    {
        return view('admin.room.form', [
            'room' => $room,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Room $room)
    {        
        $room->room_title = $request->room_title;
        $room->description = $request->description;
        $room->price = $request->price;
        $room->wifi = $request->wifi;
        $room->room_type = $request->room_type;

        $image = $request->file('image');


        if ($image) {
            $imagename = time() . '.' . $image->getClientOriginalextension();
            $request->image->move('uploadedRooms', $imagename);
            $room->image = $imagename;
        }

        $room->update();

        // dd($room->image);

        return redirect()->route('room.index')->with('success', 'Room updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Room $room)
    {
        $room->delete();
        return redirect()->route('room.index')->with('success', 'Room deleted successfully!');
    }
    
}
