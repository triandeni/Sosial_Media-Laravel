@extends('layouts.main')
@section('container')


<div class="container">
    <div class="row">
      <div class="col-md-6">
         <div class="card">
           <div class="card-header text-center"> Edit Task Task</div>
             <div class="card-body">
                <form action="/task/{{ $tasks->id }}" method="post" >
                    @method('put')
                    @csrf
                    <div>
                    <input type="text" name="list" value="{{ old('list', $tasks->list) }}" id="task" class="form-control @error('list') is-invalid @enderror mb-2" placeholder="the name of task">
                    @error('list')
                   <span class="invalid-feedback"> {{ $message }} </span>
                    @enderror
                    </div>
                    <button type="submit" class="btn btn-info">Updated</button>
                </form>
             </div>
          </div>
        </div>
    </div>
    
@endsection