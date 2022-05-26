@extends('layouts.main')
@section('container')

@if (session()->has('message'))
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            {{ session('message') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<div class="container bootstrap snippets bootdey">
    <h1 class="text-primary text-center">Change Password</h1>
      <hr>
	<div class="row">
      <div class="col-md-9 personal-info">
        <div class="alert alert-info alert-dismissable">
    
        <form action="{{ route('password.update') }}" class="form-horizontal" method="post" role="form">
            @method('put')
            @csrf
            <div class="form-group">
                <label class="col-lg-3 control-label mb-2 mt-2" for="current_password">Current Paasword</label>
                <div class="col-lg-8">
                  <input class="form-control" type="password" name="current_password" id="current_password" placeholder=" current password">
                  @error('current_password')
                  <div class="text-danger mb-2">
                  {{ $message }}
                  </div>
                  @enderror  
                </div>
              </div>
          <div class="form-group">
            <label class="col-lg-3 control-label mb-2 mt-2" for="password">password</label>
            <div class="col-lg-8">
              <input class="form-control" type="password" name="password" id="password" placeholder="New password">
              @error('password')
              <div class="text-danger mb-2">
              {{ $message }}
              </div>
              @enderror  
             
            </div>
          </div>
         
          <div class="form-group">
            <label class="col-lg-3 control-label mb-2 mt-2" for="password_confirmation"> Confirm Password</label>
            <div class="col-lg-8">
              <input  class="form-control" type="password" name="password_confirmation" id="password_confirmation" placeholder="confir password">
              @error('password_confirmation')
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