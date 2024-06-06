<x-app-layout>

    <div class="container mx-auto mt-10 mb-10">
        <div class="space-y-10 divide-y divide-gray-900/10">

            <div class="grid grid-cols-1 gap-x-8 gap-y-8 md:grid-cols-3">

                <div class="px-4 sm:px-5">
                    <h2 class="text-base font-semibold leading-7 text-gray-900">Create / Update Rooms </h2>
                    <p class="mt-1 text-sm leading-6 text-gray-600">Create / Update the room details.</p>

                </div>

                <form method="POST">
                    <div>
                        <label>Room Name<label>
                            <input type="text" name="name">
                    </div>

                    <div>
                        <label>Room Description<label>
                            <textarea name="description"></textarea>
                    </div>

                    <div>
                        <label>Price<label>
                            <input type="number" name="price">
                    </div>

                    <div>
                        <label>Status<label>
                            <section name="status">
                                <option value="1">Available</option>
                                <option value="0">Not Available</option>
                            </section>
                    </div>

                    <div>
                        <label>Upload Image<label>
                            <input type="file" name="image">
                    </div>

                    <div>
                        <label>Slug<label>
                            <input type="text" name="slug" >
                    </div>

                    <div>
                        <input class="btn btn-primary" type="submit" value="Add Room" >
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-app-layout>

