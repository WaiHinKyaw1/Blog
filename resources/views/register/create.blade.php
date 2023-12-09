<x-layout>
    <div class="container">
    <div class="row">
    <h2><span class="text-primary">Register Form</span></h2>
        <form action="/register" method="POST">
            @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="name" class="form-control" name="name" value="{{old('name')}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name">
                    @error("name")
                        <p><span class="text-danger">{{$message}}</span></p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email"
                     class="form-control"
                     name="email"
                     value="{{old('email')}}"
                     id="exampleInputEmail1"
                     aria-describedby="emailHelp"
                     placeholder="Enter email">
                    @error("email")
                        <p><span class="text-danger">{{$message}}</span></p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">UserName</label>
                    <input type="text" class="form-control"
                    name="userName"
                    value="{{old('userName')}}"
                    id="exampleInputEmail1"
                    aria-describedby="emailHelp" placeholder="Enter Your UserName">
                    @error("userName")
                        <p><span class="text-danger">{{$message}}</span></p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control"
                    value="{{old('password')}}"
                     name="password" id="exampleInputPassword1" placeholder="Password">
                    @error("password")
                        <p><span class="text-danger">{{$message}}</span></p>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary mt-3 mb-3">Create</button>
        </form>
    </div>
    </div>


</x-layout>
