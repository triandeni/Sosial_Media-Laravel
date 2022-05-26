@extends('layouts.main')
@section('container')
<div class="row">
    <div class="col-lg-9">
        
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title ">Timeline</h3>
            </div>
            <div class="panel-content panel-activity">
                
                <div class="activity__list__header border-bottom">
                    <img src="https://i.pravatar.cc/150" alt="" />
                    <a href="#" style="text-decoration: none">{{ Auth::user()->name }}</a> 

                <form action="status" class="panel-activity__status mb-3 mt-1 mx-4 " method="post">
                    @csrf
                    <textarea name="body" id="body" placeholder="what do you think?" class="form-control "></textarea>
                    <div class="actions d-flex justify-content-end">
                        <button type="submit" class="btn btn-sm btn-rounded btn-info">
                            Post
                        </button>
                    </div>
                </div>
                </form>
                @foreach ($statuses as $status)
                <ul class="panel-activity__list">
                    <li>
                        
                        <div class="activity__list__header mt-3">
                            <img src="https://i.pravatar.cc/150" alt="{{ $status->user->name }}" />
                            <a href="#" style="text-decoration: none">{{ $status->user->name }}</a> 
                        </div>
                        <div class="activity__list__body entry-content mb-4">
                          - {{ $status->body }}
                        </div>
                        <div class="activity__list__footer  mt-2 ">
                            <a href="#"> <i class="fa fa-thumbs-up"></i>123</a>
                            <a href="#"> <i class="fa fa-comments"></i>23</a>
                            <span> <i class="fa fa-clock"></i>{{ $status->created_at->diffForHumans() }}</span>
                        </div>
                    </li>
                    @endforeach   
                </ul>
            </div>
        </div>
    </div>
    @if (Auth::user()->follows()->count())
        <div class="col-lg-3">
            <div class="card card-margin">
                <div class="card-header panel-heading">
                    <h5 class="panel-title">Recently followers</h5>
                </div>
                 @foreach (Auth::user()->follows()->limit(5)->get() as $user)
                     
                 <div class="d-flex justify-content-between mt-2 align-items-center">
                     <div class="d-flex flex-row"> <img src="https://i.pravatar.cc/200" class="rounded-circle mx-2" width="50" height="50">
                        <div class="d-flex flex-column ml-1 about mb-2 "> <span class="font-weight-bold"> {{ $user->name }}</span> 
                            <small class="text-primary"> {{ $user->created_at->diffForHumans() }}</small> </div>
                        </div>
                    </div>
                    @endforeach
                </div>               
          </div>
          @endif
</div> 
@endsection