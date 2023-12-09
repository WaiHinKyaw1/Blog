<x-admin-layout>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Slug</th>
      <th scope="col">Body</th>
      <th scope="col colspan-2">Action</th>
    </tr>
  </thead>
  <tbody>
   @foreach($blogs as $blog)
   <tr>
      <th scope="row">{{$blog->id}}</th>
      <td>{{$blog->title}}</td>
      <td>{{$blog->slug}}</td>
      <td>{{$blog->category->name}}</td>
      <td><a class="btn btn-link btn-warning" href="/admin/blogs/{{$blog->id}}/edit">Edit</a></td>
      <form action="/admin/blogs/{{$blog->id}}/delete" method="post">
        @csrf
        @method('DELETE')
      <td><button  type="submit" class="btn-danger">Delete</button></td>
      </form>
    </tr>
    @endforeach

  </tbody>

</table>
{{$blogs->links()}}
</x-admin-layout>
