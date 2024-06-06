<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Room;

use App\Models\RoomBooking;

use App\Models\Gallary;

use App\Models\Contact;

use App\Models\User;

class HomeController extends Controller
{

    // public function index()
    // {
    //     return view('admin.room_details', [
    //         'room_details' => Room::paginate(10),
    //     ]);
    // }

    public function room_details($id)
    {
        $room = Room::find($id);
        return view('admin.room-details', compact('room'));
    }

    public function room_booking(Request $request, $id)
    {

        $request->validate([
            'check_in' => 'required|date',
            'check_out' => 'date|after:check_in',
        ]);

        $room = new RoomBooking;
        $room->room_id = $id;
        $room->name = $request->name;
        $room->email = $request->email;
        $room->phone = $request->phone;


        $checkin = $request->check_in;
        $checkout = $request->check_out;
        $isBooked = RoomBooking::where('room_id', $id)
            ->where('check_in', '<=', $checkin)
            ->where('check_out', '>=', $checkout)
            ->exists();

        if ($isBooked) {
            return redirect()->back()->with('error', 'Room Already Booked For This Date');
        } else {
            $room->check_in = $request->check_in;
            $room->check_out = $request->check_out;
            $room->save();
        }


        // $room->check_in = $request->check_in;
        // $room->check_out = $request->check_out;
        // $room->save();

        return redirect()->back()->with('message', 'Room Booked Successfully');
    }

    public function view_gallary()
    {
        $gallary = Gallary::all();
        return view('admin.gallary', compact('gallary'));
    }

    public function upload_gallary(Request $request)
    {
        $data = new Gallary;
        $image = $request->image;

        if ($image) {
            $image_name = time() . '_' . $image->getClientOriginalName();
            $request->image->move('gallary', $image_name);

            $data->image = $image_name;
            $data->save();
            return redirect()->back()->with('message', 'Image Uploaded Successfully');
        }
    }

    public function delete_gallary($id)
    {
        $gallary = Gallary::find($id);
        $gallary->delete();
        return redirect()->back()->with('message', 'Image Deleted Successfully');
    }

    public function contact(Request $request)
    {
        $contact = new Contact;

        $contact->message = $request->message;

        $contact->name = $request->name;

        $contact->email = $request->email;

        $contact->phone = $request->phone;

        $contact->save();

        return redirect()->back()->with('message', 'Message Sent Successfully');
    }

    public function hotel_gallary()
    {
        $gallary = Gallary::all();
        return view('admin.hotel_gallary', compact('gallary'));
    }

    public function about()
    {
        return view('admin.about');
    }

    public function approve_book($id)
    {
        $booking = RoomBooking::find($id);
        $booking->status = "Approved";
        $booking->save();
        return redirect()->back()->with('message', 'Room Booking Approved Successfully');
    }

    public function reject_book($id)
    {
        $booking = RoomBooking::find($id);
        $booking->status = "Rejected";
        $booking->save();
        return redirect()->back()->with('message', 'Room Booking Disapproved Successfully');
    }

    public function showDashboard()
    {
        $room_bookings = RoomBooking::with('room')->get();

        return view('dashboard', ['room_bookings' => $room_bookings]);
    }
    
}
