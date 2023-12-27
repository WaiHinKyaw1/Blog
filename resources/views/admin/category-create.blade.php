<x-admin-layout>
    <h1>Category Create</h1>
    <form action="/admin/category/store" method="post">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">CategoryName</label>
            <input type="text" value="" name="categoryName" class="form-control mt-2" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Category">
            @error('categoryName')
            <p class="text-danger">{{$message}}</p>
            @enderror
            <label for="exampleInputEmail1">Slug</label>
            <input type="text" value="" name="slug" class="form-control mt-2" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Category">
            @error('slug')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary mt-3">Create</button>

    </form>

</x-admin-layout>
