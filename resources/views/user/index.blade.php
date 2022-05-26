@extends('layouts.main')
@section('container')
<div class="mb-3 " style="text-decoration: none">
{{ $users->links() }}
</div>
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                @foreach ($users as $user)
                <div class="col-sm-6 col-lg-3 mb-4 flex items-center">
                    <div class="candidate-list candidate-grid">
                        <div class="candidate-list-image">
                            <img src="https://i.pravatar.cc/200" alt="" width="1px" class="rounded-sm ml-n2 me-3" />
                        </div>
                        <div class="candidate-list-details">
                                <div class="candidate-list-title" >
                                    <h5 style="text-decoration: none"><a class="text-decoration-none " style="font-size:15px " href="{{ route('stranger.index'), $user->username }}">{{ $user->name }}</a></h5>
                                </div>
                            <div class="candidate-list-favourite-time ">
                               
                                
                                @if  (Auth::user()->isNot($user))
                                    <form action="{{ route('following.store', $user) }}" method="post">
                                        @csrf
                                    <button class="btn btn-primary btn-xs">
                                        @if (Auth::user()->follows()->where('following_user_id', $user->id)->first())
                                        <i class="fa fa-times"></i>
                                        Unfollow
                                        @else
                                        <i class="fa fa-plus" style="background: rgb(26, 9, 2)"></i>
                                        Follow
                                        @endif
                                    </button> </form>
                                  
                                
                                @endif
                            </div>
                            
                        </div>
                        
                    </div>
                </div>
                @endforeach
                <div class="justift-content-center">
                {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>

@endsection