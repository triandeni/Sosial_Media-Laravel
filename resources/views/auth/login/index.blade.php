@extends('layouts.main')
@section('container')

@if (session()->has('success'))
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            {{ session('success') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
@if (session()->has('loginError'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('loginError') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
    
<section class="vh-200 bg-image" style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.jpg');">
    <div class="mask d-flex align-items-center h-100 gradient-custom-3 mt-2">
        <div class="container h-200 mt-5 mb-5">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-9 col-lg-7 col-xl-7">
              <div class="card" style="border-radius: 20px;">
                <div class="card-body p-5">
                <h2 class="text-uppercase text-center mb-2">Login</h2>
  
                <form action="/login" method="post">
                    @csrf
                  <div class="form-outline mb-1">
                    <label class="form-label" for="email">Email</label>
                    <input type="email" id="email" value="{{ old('email') }}" name="email" class="form-control form-control-lg" />
                 @error('email')
                 <div class="text-danger mb-2">
                 {{ $message }}
                 </div>
                 @enderror  
                </div>
  
                  <div class="form-outline mb-3">
                    <label class="form-label" for="password">Password</label>
                    <input type="password" id="password" name="password" class="form-control form-control-lg" />
                   @error('password')
                   <div class="text-danger mb-3">
                    {{ $message }}
                    </div>
                   @enderror
                  </div>
  
                  <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body ">Login</button>
                  </div>
  
                  <p class="text-center text-muted mt-2 mb-0">Don't have an account? <a href="register" class="text-primary"><u> Sign Up</u></a></p>
  
                </form>
  
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection