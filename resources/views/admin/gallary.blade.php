<x-app-layout>

    <center>
        <h1 class="text-2xl font-semibold text-gray-900">Gallary</h1>

        <div class="row">
            @foreach ($gallary as $gallary)
                <div class="col-md-4" style="padding: 30px">
                    <img style="height: 280px!important; width: 470px!important" src="/gallary/{{ $gallary->image }}">
                    <a href="{{ url('delete_gallary/' . $gallary->id) }}" class="btn btn-danger">Delete</a>
                </div>
            @endforeach

        </div>

        <form action="{{ url('upload_gallary') }}" method="Post" enctype="multipart/form-data">
            @csrf
            <div style="padding: 30px">
                <label style="color: white; font-weight:bold;">Add Image</label><br>
                <input type="file" name="image" required>
            </div>

            <div>
                <input style="color: white" class="btn btn-primary" type="submit" value="Upload Image">
            </div>
        </form>

    </center>

</x-app-layout>
