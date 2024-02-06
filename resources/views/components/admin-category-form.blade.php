@props(['category'=>null])
<form action=" {{$category ? '/admin/category/'.$category->id.'/categoryUpate' : '/admin/category/store' }}" method="post">
    
        @csrf
        @if($category)
        @method('PUT')
        @endif
        <div class="form-group">
            <label for="exampleInputEmail1">CategoryName</label>
            <input type="text" value="{{$category?->name}}" name="name" class="form-control mt-2" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Category">
            @error('name')
            <p class="text-danger">{{$message}}</p>
            @enderror
            <label for="exampleInputEmail1">Slug</label>
            <input type="text" value="{{$category?->slug}}" name="slug" class="form-control mt-2" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Slug">
            @error('slug')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary mt-3">Update</button>

    </form>
