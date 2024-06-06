<x-app-layout>
    {{-- @include('home.room') --}}
    <div class="sm:flex sm:items-center">
        <div class="sm:flex-auto">
            <h1 class="text-base font-semibold leading-6 text-gray-900">Room</h1>
            <p class="mt-2 text-sm text-gray-700">
                A list of all the room including the room details and actions.
            </p>
        </div>
        <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
            <a href="{{ route('room.create') }}" class="btn btn-gradient-primary btn-rounded btn-fw">
                Create Room
            </a>
        </div>
    </div>
    <div class="overflow-x-auto">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th> ID </th>
                    <th> Room title </th>
                    <th> Image </th>
                    <th> Description </th>
                    <th> Price </th>
                    <th> Wifi </th>
                    <th> Room Type </th>
                    <th> Actions </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rooms as $room)
                    <tr>
                        <td> {{ $room->id }} </td>
                        <td> {{ $room->room_title }} </td>
                        {{-- <td> {{ $room->image }} </td> --}}
                        <td> <img src="{{ 'uploadedRooms/' . $room->image }}"> </td>
                        <td> {{ \Illuminate\Support\Str::words($room->description, 9, '...') }} </td>
                        <td> {{ $room->price }} </td>
                        <td> {{ $room->wifi }} </td>
                        <td> {{ $room->room_type }} </td>
                        <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-0">
                            <div class="flex gap-3">
                                <a href="{{ route('room.edit', $room->id) }}"
                                    class="rounded bg-white px-2 py-1 text-xs font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">Edit</a>
                                <form action="{{ route('room.destroy', $room->id) }}" method="POST">
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
