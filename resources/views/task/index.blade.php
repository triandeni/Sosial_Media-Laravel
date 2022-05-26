@extends('layouts.main')

@section('container')
<div class="container">
<div class="row">
  <div class="col-md-6">
     <div class="card">
       <div class="card-header text-center"> Create New Task</div>
         <div class="card-body">
            <form action="/task" method="post" >
                @csrf
                <div>
                <input type="text" name="list"  value="{{ old('list', $tasks->list) }}"  id="task" class="form-control @error('list') is-invalid @enderror mb-2" placeholder="the name of task">
                @error('list')
               <span class="invalid-feedback"> {{ $message }} </span>
                @enderror
                </div>
                <button type="submit" class="btn btn-info">Add</button>
            </form>
         </div>
      </div>
    </div>
</div>
    <ul class="list-group mt-4">
        @foreach ($task as $index => $tasks)
       <li class="list-group-item d-flex align-items-center justify-content-between">
        {{ $index + 1 }} - {{ $tasks->list }} 
          <div class="d-fex">
      <button class="btn btn-success me-2"> <a style="text-decoration:none" href="/task/{{ $tasks->id }}/edit">edit</a></button>
       
       <form action="task/{{ $tasks->id }}" method="post" style="display: inline">
          @csrf
          @method('delete')
          <button type="submit" class="btn btn-danger">delete</button>
  
      </form>
      </div> 
      </li>
            
        @endforeach 
     </ul>
</div>
</div>

 @endsection

 