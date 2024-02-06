<x-admin-layout>
    <h1>Comment</h1>
    <table class="table boder-1">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Body</th>
      <th scope="col colspan-2">Status</th>
    </tr>
  </thead>
  <tbody>
    @foreach($comments as $comment)
  <tr>
      <th scope="row">{{$comment->id}}</th>
      <td>{{$comment->body}}</td>

      <td>
      @if($comment->status == 1)
      <a href="comment/{{$comment->id}}/edit"> <button class="btn btn-success" type="button">Public</button></a>
     @else
     <a href="comment/{{$comment->id}}/edit">  <button class="btn btn-danger" type="button">Unpublic</button></a>

    @endif
    </td>
  </tr>
  @endforeach
    </tbody>
    </table>
</x-admin-layout>
