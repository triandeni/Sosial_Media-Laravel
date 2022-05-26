@extends('layouts.main')
@section('container')

@if (session()->has('message'))
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            {{ session('message') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<div class="row">
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
                    <i class="fa fa-minus"></i>
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
                 <a href="{{ route('profile.edit') }}"> <button class="btn btn-rounded btn-info">
                    Edit Profil
                </button>
                </div></a>
            @endif
            <div class="profile-cover__info">
                <ul class="nav">
                    <div>
                    <a href="{{ route('profile', $user->username) }}" class="me-2 btn "><strong>{{ $user->statuses->count() }}</strong>Posting</a>
                    <a href="{{ route('profile.following', $user->username) }}" class="me-2 btn "><strong>{{ $user->follows->count() }}</strong>Following</a>
                    <a href="{{ route('profile.follower', $user->username) }}" class="me-2 btn"><strong>{{ $user->followers->count() }}</strong>Followers</a>
                </ul>
            </div>
        </div>
                
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title ">Timeline</h3>
                    </div>
                    <div class="panel-content panel-activity">
                        
                        <div class="activity__list__header border-bottom">
                            <img src="https://i.pravatar.cc/150" alt="" />
                            <a href="#" style="text-decoration: none">{{ $user->name }}</a> 
        
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
                       
                        <ul class="panel-activity__list">
                           @foreach ($statuses as $status)
                            <li>
                                <div class="activity__list__header mt-3">
                                    <img src="https://i.pravatar.cc/150" alt="" />
                                    <a href="#" style="text-decoration: none">{{ $status->user->name }}</a> 
                                </div>
                                <div class="activity__list__body entry-content mb-4">
                                    <p>
                                 - {{ $status->body }}
                                    </p>
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
    </div>
</div>
@endsection