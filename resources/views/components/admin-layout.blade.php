<x-layout>
    <div class="container my-3">
        <div class="row">
            <div class="col-md-4">
                <ul class="list-group">
                    <li class="list-group-item">
                        <a href="/admin">Blog</a>
                    </li>
                    <li class="list-group-item">
                        <a href="/admin/blog/create">Blog Create</a>
                    </li>

                </ul>
                <div class=" mt-3">
                <ul class="list-group">
                    <li class="list-group-item">
                        <a href="/admin/blog/categoryShow">Category</a>
                    </li>
                    <li class="list-group-item">
                        <a href="/admin/blog/categoryCreate">Category Create</a>
                    </li>

                </ul>
            </div>
            </div>

            <div class="col-md-8">
                {{$slot}}
            </div>
        </div>
    </div>
</x-layout>
