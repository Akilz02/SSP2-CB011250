{{-- <x-app-layout>
    Room Categories

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4"
                    role="alert">
                    <strong class="font-bold">Success!</strong>
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <div class="flex justify-between mb-4">
                        <div>
                            <h1 class="text-2xl font-semibold text-gray-900">Room Categories</h1>
                        </div>
                        <div>
                            <a href="{{ route('room-category.create') }}"
                                class="rounded bg-white px-2 py-1 text-xs font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">Create
                                Room Category</a>
                        </div>
                    </div>

                    <div class="flex flex-col">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div
                                class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                <div
                                    class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                    <table class="min-w-full divide-y divide-gray-200">
                                        <thead class="bg-gray-50">
                                            <tr>

                                                <th scope="col"
                                                    class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                                    ID</th>
                                                <th scope="col"
                                                    class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                                    Name</th>
                                                <th scope="col"
                                                    class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                                    Actions</th>
                                                <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-0">
                                                    <span class="sr-only">Edit</span>
                                                    

</x-app-layout> --}}

<x-app-layout>
    <div class="sm:flex sm:items-center">
        <div class="sm:flex-auto">
            <h1 class="text-base font-semibold leading-6 text-gray-900">Room Categories</h1>
            <p class="mt-2 text-sm text-gray-700">
                A list of all the room categories in your account including their name, slug and actions.
            </p>
        </div>
        <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
            <a href="{{ route('room-category.create') }}" class="btn btn-gradient-primary btn-rounded btn-fw">
                Create Room
            </a>
        </div>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th> ID </th>
                <th> Name </th>
                <th> Slug </th>
                <th> Action </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($Categories as $room_category)
                <tr>
                    <td> {{ $room_category->id }} </td>
                    <td> {{ $room_category->name }} </td>
                    <td> {{ $room_category->slug }} </td>
                    {{-- <td> May 15, 2015 </td> --}}
                    <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-0">
                        <div class="flex gap-3">
                            {{-- <a href="{{ route('menu-category.show', $menu_category->id) }}" --}}
                            {{-- class="rounded bg-white px-2 py-1 text-xs font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">Show</a> --}}
                            <a href="{{ route('room-category.edit', $room_category->id) }}"
                                class="rounded bg-white px-2 py-1 text-xs font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">Edit</a>
                            <form action="{{ route('room-category.destroy', $room_category->id) }}" method="POST">
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
</x-app-layout>
