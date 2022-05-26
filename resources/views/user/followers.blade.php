@extends('layouts.main')
@section('container')
<div class="col-lg-9">
<div class="panel profile-cover">
    <div class="profile-cover__img">
        <img src="https://bootdey.com/img/Content/avatar/avatar6.png" alt="" />
        <h3 class="h3">{{ $user->name }}</h3>
       <a > Joined : {{ $user->created_at = date("M, Y")}} <a>
    </div>
    @if (Auth::user()->isNot($user))
    <div class="profile-cover__action bg--img" data-overlay="0.3">
        <form action="{{ route('following.store', $user) }}" method="post">
            @csrf
        <button class="btn btn-rounded btn-info">
            @if (Auth::user()->follows()->where('following_user_id', $user->id)->first())
            <i class="fa fa-times"></i>
            Unfollow
            @else
            <i class="fa fa-plus"></i>
            Follow
            @endif
        </button> </form>
        <button class="btn btn-rounded btn-info">
            <i class="fa fa-comment"></i>
            <span>Message</span>
        </button>
    </div>
    @else
    <div class="profile-cover__action bg--img" data-overlay="0.3">
        <button class="btn btn-rounded btn-info">
            Edit Profil
        </button>
        </div>
    @endif
    <div class="profile-cover__info">
        <ul class="nav">
            <a href="{{ route('profile', $user->username) }}" class="me-2 btn "><strong>{{ $user->statuses->count() }}</strong>Posting</a>
                    <a href="{{ route('profile.following', $user->username) }}" class="me-2 btn "><strong>{{ $user->follows->count() }}</strong>Following</a>
                    <a href="{{ route('profile.follower', $user->username) }}" class="me-2 btn"><strong>{{ $user->followers->count() }}</strong>Followers</a>
        </ul>
    </div>
</div>

    <div class="card card-margin">
        <div class="card-header panel-heading">
            <h5 class="panel-title">followers</h5>
        </div>
         @foreach ($followers as $user)
             
   
            <div class="list-group">
                <div class="list-group-item d-flex align-items-center">
                    <img src="https://i.pravatar.cc/200" alt="" width="50px" class="rounded-sm ml-n2 me-3" />
                    <div class="flex-fill pl-3 pr-3">
                        <div><a href="#" class="text-dark font-weight-600 " style="text-decoration:none">{{ $user->name }}</a></div>
                        <div class="text-muted fs-10px">Joined :  {{ $user->created_at = date("M, Y") }}</div>
                    </div>
                    @if (Auth::user()->isNot($user))
                    <form action="{{ route('following.store', $user) }}" method="post">
                        @csrf
                    <button class="btn btn-rounded btn-info">
                        @if (Auth::user()->follows()->where('following_user_id', $user->id)->first())
                        <i class="fa fa-minus"></i>
                        Unfollow
                        @else
                        <i class="fa fa-plus"></i>
                        Follow
                        @endif
                    </button> </form>
                </div>
                @endif
            </div>
            @endforeach
        </div>               
  </div>
</div> 
    
@endsection