@extends('shared.layout')
@section('content')
    <h1 style="text-align:center">My Profile:</h1>
    <form action="{{ route('updateProfile',$user->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="card mx-5">
            <div class="px-3 pt-4 pb-2">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center">
                        <img style="width:150px" class="me-3 avatar-sm rounded-circle" src="{{ $user->getImageUrl() }}"
                            alt="Mario Avatar">
                        <div>
                            <textarea class="form-control" name="name" id="name" rows="3"></textarea>
                        </div>
                    </div>
                    @if (Auth::user()->id == $user->id)
                        <div>
                            <a href="{{ route('editProfile', $user->id) }}">Edit</a>
                        </div>
                    @endif
                </div>
                <input type="file" name="image" >
                <div class="px-2 mt-4">
                    <h5 class="fs-5"> About : </h5>
                    <p class="fs-6 fw-light">
                        <textarea class="form-control" name="bio" id="bio" rows="3"></textarea>
                    </p>
                    <div class="mt-3">
                        <button class="btn btn-primary btn-sm"> Update </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <hr>
@endsection
