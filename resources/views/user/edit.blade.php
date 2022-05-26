@extends('layouts.main')
@section('container')

<div class="container bootstrap snippets bootdey">
    <h1 class="text-primary text-center">Edit Profile</h1>
      <hr>
	<div class="row">
      <div class="col-md-9 personal-info">
        <div class="alert alert-info alert-dismissable">
    
        <form action="{{ route('profile.update') }}" class="form-horizontal" method="post" role="form">
            @method('put')
            @csrf
            <div class="form-group">
                <label class="col-lg-3 control-label mb-2 mt-2" for="username">Username</label>
                <div class="col-lg-8">
                  <input value="{{ old('username', Auth::user()->username) }} "class="form-control" type="text" name="username" id="username" placeholder="Input Username">
                  @error('username')
                  <div class="text-danger mb-2">
                  {{ $message }}
                  </div>
                  @enderror  
                </div>
              </div>
          <div class="form-group">
            <label class="col-lg-3 control-label mb-2 mt-2" for="name">Name</label>
            <div class="col-lg-8">
              <input value="{{ old('name', Auth::user()->name) }}" class="form-control" type="text" name="name" id="name" placeholder="Input Name">
              @error('name')
              <div class="text-danger mb-2">
              {{ $message }}
              </div>
              @enderror  
             
            </div>
          </div>
         
          <div class="form-group">
            <label class="col-lg-3 control-label mb-2 mt-2" for="email">Email:</label>
            <div class="col-lg-8">
              <input value="{{ old('email', Auth::user()->email) }} "class="form-control" type="email" name="email" id="email" placeholder="Input Email">
              @error('email')
              <div class="text-danger mb-2">
              {{ $message }}
              </div>
              @enderror  
            </div>
          </div>
          <div class="row">
            <div class="col d-flex justify-content-end mb-2 mt-3">
              <button class="btn btn-primary" type="submit">Save Changes</button>
            </div>
          </div>
        </form>
      </div>
      
  </div>
</div>
<hr>    
@endsection