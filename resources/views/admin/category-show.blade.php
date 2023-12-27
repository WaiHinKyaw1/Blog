<x-admin-layout>
    <h1>Category</h1>
    <table class="table boder-1">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col colspan-2">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($categories as $category)
  <tr>
      <th scope="row">{{$category->id}}</th>
      <td>{{$category->name}}</td>
      <td>
        <a class="btn btn-link btn-warning" href="/admin/category/{{$category->id}}/categoryEdit">Edit</a>
    </td>
     <td>
     <form action="/admin/category/{{$category->id}}/categoryDelete" method="post">
        @csrf
        @method('DELETE')
        <button  type="submit" class="btn-danger">Delete</button>
    </form>
    </td>

  </tr>
    @endforeach
    </tbody>
    </table>
</x-admin-layout>
