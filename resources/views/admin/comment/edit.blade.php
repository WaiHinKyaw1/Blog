<x-admin-layout>
    <h1>Comment Edit</h1>
    <form action="update" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="exampleInputEmail1">Status</label>
                <select name="status" class="form-control mt-2" value="Public">
                    <option value="1">Public</option>
                    <option value="0">Unpublic</option>
                </select>
            @error('slug')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary mt-3">Update</button>

    </form>

</x-admin-layout>
