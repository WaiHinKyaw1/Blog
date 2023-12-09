<x-layout>
    <div class="container">
        <div class="row">
        <div class="mt-4 mb-4">
        <form action="/comments/{{$comment->id}}/update" method="POST">
            @csrf
            @method('PATCH')
            <textarea name="body" id="" cols="30" rows="10"
             class="form-control" placeholder="Comment Here...">
                {{$comment->body}}
            </textarea><br>

            <button type="submit" class="btn btn-primary">Update</button>

        </form>
    </div>
        </div>
    </div>
</x-layout>
