<x-layout>
    <!-- single blog section -->
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto text-center mb-3">
                <img src="https://creativecoder.s3.ap-southeast-1.amazonaws.com/blogs/GOLwpsybfhxH0DW8O6tRvpm4jCR6MZvDtGOFgjq0.jpg" class="card-img-top" alt="..." />

                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">{{$blog->title}}</h3>
                        <div class="card-subtitle mb-3">Author - <a href="/users/{{$blog->author->username}}">{{$blog->author->name}}</a></div>
                        <div class="card-subtitle mb-3"> <a href="/categories/{{$blog->category->slug}}"> <span class="badge bg-secondary">{{$blog->category->name}}</span></a></div>
                        <div class="card-subtitle mb-3 text-muted small">{{$blog->created_at->diffForHumans()}}</div>
                        <div>
                          <form action="/blogs/{{$blog->slug}}/handle-subscribe"
                          method="POST">
                          @csrf
                          @if($blog->isSubscribeBy(auth()->user()))
                            <button type="submit" class=" btn btn-warning">Unsubscribe</button>
                            @else
                            <button type="submit" class=" btn btn-secondary">Subscribe</button>
                            @endif
                          </form>
                        </div>
                        <p class="card-text">
                            {{$blog->body}}
                        </p>
                    </div>
                </div>

            </div>
            <div class="container">
                <div class="row">
                    <div>
                        <form action="/blogs/{{$blog->slug}}/comments" method="POST">
                            @csrf

                            <textarea name="body" id="" cols="30" rows="10" class="form-control" placeholder="Comment Here..."></textarea><br>

                            <button type="submit" class="btn btn-primary">Comment</button>

                        </form>
                    </div>
                    @foreach($blog->comments()->with('user')->orderby('created_at','desc')->get() as $comment)

                    <div class=" p-4 mt-2">

                            <h3>
                                {{$comment->user->name}}
                            </h3>

                            <p>
                                {{$comment->body}}
                            </p>
                            <div class="d-flex ">
                            <form action="/comments/{{$comment->id}}/delete" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-primary mx-2">
                                    Delete
                                </button>

                            </form>
                            <div class="mr">
                                <a href="/comments/{{$comment->id}}/edit" class="btn btn-warning">Edit</a>
                            </div>
                            </div>

                    </div>

                    @endforeach
                </div>
            </div>
        </div>

    </div>

    <!-- subscribe new blogs -->
    <x-subscribe />
    <x-blog_you_may_like_section :randomBlogs="$randomBlogs" />
</x-layout>
