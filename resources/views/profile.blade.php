@extends('shared.layout')
@section('content')
    @include("dashboard.flashMsg")
    <h1 style="text-align:center">My Profile:</h1>
    <div class="card mx-5">
        <div class="px-3 pt-4 pb-2">
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <img style="width:150px" class="me-3 avatar-sm rounded-circle" src="{{ $user->getImageUrl() }}"
                        alt="{{ $username = $user->name . ' avatar' }}">
                    <div>
                        <h3 class="card-title mb-0"><a href="#"> {{ $user->name }}
                            </a></h3>
                        <span class="fs-6 text-muted">{{ $userID = '@' . $user->name . $user->id }}</span>

                    </div>
                </div>
                @if (Auth::user()->id == $user->id)
                    <div>
                        <a href="{{ route('editProfile', $user->id) }}">Edit</a>
                    </div>
                @endif
            </div>
            <div class="px-2 mt-4">
                <h5 class="fs-5"> About : </h5>
                <p class="fs-6 fw-light">
                    {{ $user->bio }}
                </p>
                <div class="d-flex justify-content-start">
                    <a href="#" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-user me-1">
                        </span> 120 Followers </a>
                    <a href="#" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-brain me-1">
                        </span> {{ $user->ideas()->count() }} </a>
                    <a href="#" class="fw-light nav-link fs-6"> <span class="fas fa-comment me-1">
                        </span> {{ $user->comments()->count() }} </a>
                </div>
                @if (Auth::user()->id !== $user->id)
                    <div class="mt-3">
                        @if(Auth::user()->follows($user))
                        <form action="{{ route('unfollowUser', $user->id) }}" method="post">
                            @csrf
                            @method("delete")
                            <button type="submit" class="btn btn-primary btn-sm btn-danger"> Unfollow </button>
                        </form>
                        @else
                        <form action="{{ route('followUser', $user->id) }}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-primary btn-sm"> Follow </button>
                        </form>
                        @endif
                    </div>
                @endif
            </div>
        </div>
    </div>
    <hr>
    <h2 style="text-align:center">My Ideas:</h2>
    @include('profile.ideas')
@endsection
