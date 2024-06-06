<x-app-layout>
    <div class="sm:flex sm:items-center">
        <div class="sm:flex-auto">
            <h1 class="text-base font-semibold leading-6 text-gray-900">Room Booking</h1>
            <p class="mt-2 text-sm text-gray-700">
                A list of all the room booking including their name, email, phone, checkin/out and actions.
            </p>
        </div>
        <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
            <a href="{{ route('room-booking.create') }}" class="btn btn-gradient-primary btn-rounded btn-fw">
                Create Room Booking
            </a>
        </div>
    </div>
    <div class="overflow-x-auto">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th> ID </th>
                    <th> Room ID </th>
                    <th> Name </th>
                    <th> Email </th>
                    <th> Phone </th>
                    <th> Check In </th>
                    <th> Check Out </th>
                    <th> Status </th>
                    {{-- <th> Room Title </th> --}}
                    <th> Price </th>
                    <th> Image </th>
                    <th> Status Update </th>
                    <th> Actions </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($room_bookings as $room_booking)
                    <tr>
                        <td> {{ $room_booking->id }} </td>
                        <td> {{ $room_booking->room_id }} </td>
                        <td> {{ $room_booking->name }} </td>
                        <td> {{ $room_booking->email }} </td>
                        <td> {{ $room_booking->phone }} </td>
                        <td> {{ $room_booking->check_in }} </td>
                        <td> {{ $room_booking->check_out }} </td>
                        <td> {{ $room_booking->status }} </td>
                        {{-- <td>
                            @if ($room_booking->status == 'approved')
                                <span style="color: green;">Approved</span>
                                @endif

                            @if ($room_booking->status == 'rejected')
                                <span style="color: red;">Rejected</span>
                            @endif

                            @if ($room_booking->status == 'pending')
                                <span style="color: black;">Pending</span>
                                
                            @endif
                        </td> --}}
                        {{-- <td> {{ $room_booking->room->room_title }} </td> --}}
                        <td> {{ $room_booking->room->price }} </td>
                        <td> <img src="{{ asset('uploadedRooms/' . $room_booking->room->image) }}" alt="image" 
                                width="100"> </td>
                        <td> <a class="rounded bg-white px-2 py-1 text-xs font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50"
                                style="color: green" href="{{ url('approve_book', $room_booking->id) }}">Approve</a>
                            <a class="rounded bg-white px-2 py-1 text-xs font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50"
                                style="color: red" href="{{ url('reject_book', $room_booking->id) }}">Reject</a>
                        </td>
                        <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-0">
                            <div class="flex gap-3">
                                <a href="{{ route('room-booking.edit', $room_booking->id) }}"
                                    class="rounded bg-white px-2 py-1 text-xs font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">Edit</a>
                                <form action="{{ route('room-booking.destroy', $room_booking->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="rounded bg-white px-2 py-1 text-xs font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
