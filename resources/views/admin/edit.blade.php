<x-admin-layout>
    <form action="/admin/blogs/store" method="post">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Blog Title</label>
            <input type="text" value="{{$blog->title}}" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Title">
        </div>
        @error('title')
        <p class="text-danger">{{$message}}</p>
        @enderror
        <div class="form-group">
            <label for="exampleInputPassword1">Blog Slug</label>
            <input type="text"value="{{$blog->slug}}"  name="slug" class="form-control" id="exampleInputPassword1" placeholder="Enter Slug">
        </div>
        @error('slug')
        <p class="text-danger">{{$message}}</p>
        @enderror
        <div class="form-group">
            <label for="exampleInputEmail1">Blog Body</label>
            <textarea name="body"  class="form-control" id="" cols="30" rows="10">
            {{$blog->body}}
    </textarea>
    @error('body')
        <p class="text-danger">{{$message}}</p>
        @enderror
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Blog Category</label>
            <select name="category_id" class="form-control" id="">

                @foreach($categories as $category)
                <option {{$category->id == $blog->category->id ? 'selected' : '' }} value="{{$category->id}}">
                    {{$category->name}}
                </option>
                @endforeach

            </select>
        </div>
        @error('category_id')
        <p class="text-danger">{{$message}}</p>
        @enderror
        <form action="/admin/blogs/{{$blog->id}}/update" method="post">
            @csrf
            @method('PUT')
        <button type="submit" class="btn btn-primary mt-3">Update</button>
        </form>
    </form>
</x-admin-layout>
