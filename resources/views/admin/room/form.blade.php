<x-app-layout>

    <div class="container mx-auto mt-10 mb-10">
        <div class="space-y-10 divide-y divide-gray-900/10">

            <div class="grid grid-cols-1 gap-x-8 gap-y-8 md:grid-cols-3">

                <div class="px-4 sm:px-5">
                    <h2 class="text-base font-semibold leading-7 text-gray-900">Create / Update Room</h2>
                    <p class="mt-1 text-sm leading-6 text-gray-600">Create / Update the Room details.</p>

                </div>

                <form method="POST" enctype="multipart/form-data"
                    @if ($room->id) action="{{ route('room.update', $room->id) }}"
        @else action="{{ route('room.store') }}" @endif
                    class="bg-white shadow-sm ring-1 ring-gray-900/5 sm:rounded-xl md:col-span-2 mx-10">

                    {{-- <div class="px-4 sm:px-8">
                        <h2 class="text-base font-semibold leading-7 text-gray-900">Update Categories</h2>
                        <p class="mt-1 text-sm leading-6 text-gray-600">Update the Category details.</p>
                    </div> --}}

                    @csrf
                    @if ($room->id)
                        @method('PUT')
                    @endif

                    <div class="px-4 py-6 sm:p-8">
                        <div class="grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                            <div class="sm:col-span-3">
                                <div class="mt-2">
                                </div>
                            </div>

                            <div class="col-span-full">
                                <label for="name"
                                    class="block text-sm font-medium leading-6 text-gray-900">Room Title</label>
                                <input type="text" name="room_title" id="room_title" value="{{ old('room_title',$room->room_title) }}"
                                    class="mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('room_title') border-red-500 @enderror">
                                @error('room_title')
                                    <p class="text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- <div class="col-span-full">
                                <label for="name"
                                    class="block text-sm font-medium leading-6 text-gray-900">Image</label>
                                <input type="file" name="image" id="image" value="{{ $room->image }}"
                                    class="mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('image') border-red-500 @enderror">
                                @error('image')
                                    <p class="text-red-500">{{ $message }}</p>
                                @enderror
                            </div> --}}

                            <div class="col-span-full">
                                <label>Image upload</label>
                                <input type="file" value="{{$room->image}}" name="image" class="mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm
                                 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('image') border-red-500 @enderror">
                              </div>

                            <div class="col-span-full">
                                <label for="name"
                                    class="block text-sm font-medium leading-6 text-gray-900">Description</label>
                                <textarea type="text" name="description" id="description" value="{{ $room->description }}"
                                    class="form-control">{{ old('description',$room->description) }}</textarea>
                                @error('description')
                                    <p class="text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="col-span-full">
                                <label for="name"
                                    class="block text-sm font-medium leading-6 text-gray-900">Price</label>
                                <input type="text" name="price" id="price" value="{{ $room->price }}"
                                    class="mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('price') border-red-500 @enderror">
                                @error('price')
                                    <p class="text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-span-full">
                                <label for="name"
                                    class="block text-sm font-medium leading-6 text-gray-900">Wifi</label>
                                {{-- <input type="text" name="wifi" id="wifi" value="{{ $room->wifi }}"
                                    class="mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('wifi') border-red-500 @enderror">
                                @error('wifi')
                                    <p class="text-red-500">{{ $message }}</p>
                                @enderror --}}
                                <select name="wifi" id="wifi" class="form-control form-control-sm" value="{{ $room->wifi }}">
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                            </div>

                            <div class="col-span-full">
                                <label for="name"
                                    class="block text-sm font-medium leading-6 text-gray-900">Room Type</label>
                                {{-- <input type="text" name="room_type" id="room_type" value="{{ $room->room_type }}"
                                    class="mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('room_type') border-red-500 @enderror">
                                @error('room_type') --}}
                                <select name="room_type" id="room_type" class="form-control form-control-sm" value="{{ $room->room_type }}">
                                    <option value="Single">Single</option>
                                    <option value="Double">Double</option>
                                    <option value="Triple">Triple</option>
                                </select>
                                    {{-- <p class="text-red-500">{{ $message }}</p>
                                @enderror --}}
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