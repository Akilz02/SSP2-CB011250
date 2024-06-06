<x-app-layout>

    <div class="container mx-auto mt-10 mb-10">
        <div class="space-y-10 divide-y divide-gray-900/10">

            <div class="grid grid-cols-1 gap-x-8 gap-y-8 md:grid-cols-3">

                <div class="px-4 sm:px-5">
                    <h2 class="text-base font-semibold leading-7 text-gray-900">Create / Update Room Booking</h2>
                    <p class="mt-1 text-sm leading-6 text-gray-600">Create / Update the Room Booking details.</p>

                </div>

                <form method="POST"
                    @if ($room_booking->id) action="{{ route('room-booking.update', $room_booking->id) }}"
        @else action="{{ route('room-booking.store') }}" @endif
                    class="bg-white shadow-sm ring-1 ring-gray-900/5 sm:rounded-xl md:col-span-2 mx-10">

                    {{-- <div class="px-4 sm:px-8">
                        <h2 class="text-base font-semibold leading-7 text-gray-900">Update Categories</h2>
                        <p class="mt-1 text-sm leading-6 text-gray-600">Update the Category details.</p>
                    </div> --}}

                    @csrf
                    @if ($room_booking->id)
                        @method('PUT')
                    @endif

                    <div class="px-4 py-6 sm:p-8">
                        <div class="grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                            <div class="sm:col-span-3">
                                <div class="mt-2">
                                </div>
                            </div>

                            {{-- <div class="col-span-full">
                                <label for="room_id"
                                    class="block text-sm font-medium leading-6 text-gray-900">Room</label>
                                <div class="mt-2">
                                    <select id="room_id" name="room_id"
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        <option value="">Select Room</option>
                                        @foreach ($rooms as $room)
                                            <option value="{{ $room->id }}"
                                                {{ old('room_id', $room_booking->room_id) == $room->id ? 'selected' : '' }}>
                                                {{ $room->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <p class="mt-3 text-sm leading-6 text-gray-600">Room for the booking.</p>
                                @error('room_id')
                                    <p class="mt-3 text-sm leading-6 text-red-600">{{ $message }}</p>
                                @enderror
                            </div> --}}
                            <div class="col-span-full">
                                <label for="name"
                                    class="block text-sm font-medium leading-6 text-gray-900">Room ID</label>
                                <div class="mt-2">
                                    <input id="room_id" name="room_id" rows="3"
                                        value="{{ old('name', $room_booking->room_id) }}"
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                                </div>
                                <p class="mt-3 text-sm leading-6 text-gray-600">ID of the Room.</p>
                                @error('name')
                                    <p class="mt-3 text-sm leading-6 text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-span-full">
                                <label for="name"
                                    class="block text-sm font-medium leading-6 text-gray-900">Name</label>
                                <div class="mt-2">
                                    <input id="name" name="name" rows="3"
                                        value="{{ old('name', $room_booking->name) }}"
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                                </div>
                                <p class="mt-3 text-sm leading-6 text-gray-600">Name of the customer.</p>
                                @error('name')
                                    <p class="mt-3 text-sm leading-6 text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="col-span-full">
                                <label for="slug"
                                    class="block text-sm font-medium leading-6 text-gray-900">Email</label>
                                <div class="mt-2">
                                    <input id="email" name="email" type="email" rows="3"
                                        value="{{ old('email', $room_booking->email) }}"
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                                </div>
                                <p class="mt-3 text-sm leading-6 text-gray-600">Email of the customer.</p>
                                @error('email')
                                    <p class="mt-3 text-sm leading-6 text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-span-full">
                                <label for="phone"
                                    class="block text-sm font-medium leading-6 text-gray-900">Phone</label>
                                <div class="mt-2">
                                    <input id="phone" name="phone" rows="3"
                                        value="{{ old('phone', $room_booking->phone) }}"
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                                </div>
                                <p class="mt-3 text-sm leading-6 text-gray-600">Phone of the customer.</p>
                                @error('phone')
                                    <p class="mt-3 text-sm leading-6 text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-span-full">
                                <label for="check_in" class="block text-sm font-medium leading-6 text-gray-900">Check
                                    In</label>
                                <div class="mt-2">
                                    <input id="check_in" name="check_in" type="date" rows="3"
                                        value="{{ old('check_in', $room_booking->check_in) }}"
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                                </div>
                                <p class="mt-3 text-sm leading-6 text-gray-600">Check In date.</p>
                                @error('check_in')
                                    <p class="mt-3 text-sm leading-6 text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-span-full">
                                <label for="check_out" class="block text-sm font-medium leading-6 text-gray-900">Check
                                    Out</label>
                                <div class="mt-2">
                                    <input id="check_out" name="check_out" type="date" rows="3"
                                        value="{{ old('check_out', $room_booking->check_out) }}"
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                                </div>
                                <p class="mt-3 text-sm leading-6 text-gray-600">Check Out date.</p>
                                @error('check_out')
                                    <p class="mt-3 text-sm leading-6 text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center justify-end gap-x-6 border-t border-gray-900/10 px-4 py-4 sm:px-8">
                        <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
                        <button type="submit"
                            class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-app-layout>
