<?php

namespace App\Http\Controllers;

use App\Models\RoomBooking;
use Illuminate\Http\Request;

class RoomBookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.room_booking.index', [
            'room_bookings' => RoomBooking::paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.room_booking.form', [
            'room_booking' => new RoomBooking(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        (new RoomBooking())->create($request->all());
        return redirect()->route('room-booking.index')->with('success', 'Room booking created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(RoomBooking $roomBooking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RoomBooking $roomBooking)
    {
        return view('admin.room_booking.form', [
            'room_booking' => $roomBooking,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RoomBooking $roomBooking)
    {
        $roomBooking->update($request->all());
        return redirect()->route('room-booking.index')->with('success', 'Room booking updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RoomBooking $roomBooking)
    {
        $roomBooking->delete();
        return redirect()->route('room-booking.index')->with('success', 'Room booking deleted successfully!');
    }


}
