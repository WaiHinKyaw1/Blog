<x-layout>
<div class="container">
    <div class="row">
    
    <form action="/login" method="POST">
        @csrf
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    @error('email')
    <p><span class="text-danger">{{$message}}</span></p>
    @enderror
</div>
  <div class="form-group mb-3">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">
    @error('password')
    <p><span class="text-danger">{{$message}}</span></p>
    @enderror
</div>

  <button type="submit" class="btn btn-primary mb-3">Login</button>
</form>

    </div>
</div>
</x-layout>
