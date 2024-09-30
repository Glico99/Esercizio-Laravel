@extends('shared.layout')
@section('content')
    @include('dashboard.flashMsg')
    <div class="mt-3 mx-5">
        <div class="card">
            <div class="px-3 pt-4 pb-2">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center">
                        <img style="width:50px" class="me-2 avatar-sm rounded-circle"
                            src="{{$idea->user->getImageUrl()}}" alt="Mario Avatar">
                        <div>
                            <h5 class="card-title mb-0"><a href="{{ route('showProfile',$idea->user->id) }}"> {{ $idea->user->name }}
                                </a></h5>
                        </div>
                    </div>
                    <a href="{{ route('editIdea', $idea->id) }}">Edit</a>
                    <form action="{{ route('deleteIdea', $idea->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <button class="btn btn-sm btn-danger">X</button>
                    </form>
                </div>
            </div>
            <div class="card-body">
                @if ($editing ?? false)
                    <form action="{{ route('updateIdea', $idea->id) }}" method="post">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="mb-3">
                                <input type="text" class="form-control" name="updated" id="idea" rows="3"></input>
                            </div>
                            <div class="">
                                <input type="submit" class="btn btn-dark" value="Update"><input>
                            </div>
                        </div>
                    </form>
                @else
                    <p class="fs-6 fw-light text-muted">
                        {{ $idea->content }}
                    </p>
                @endif
                <div class="d-flex justify-content-between">
                    <div>
                        <a href="#" class="fw-light nav-link fs-6"> <span class="fas fa-heart me-1">
                            </span> 100 </a>
                    </div>
                    <div>
                        <span class="fs-6 fw-light text-muted"> <span class="fas fa-clock"> </span>
                            {{ $idea->created_at }} </span>
                    </div>
                </div>
                @if (!$editing)
                    @include('comments.comments')
                @endif
            </div>
        </div>
    </div>
@endsection
