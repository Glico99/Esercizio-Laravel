<div>
    @include('comments.shareComment')
    <hr>
    @foreach ($idea->comments as $comment)
        <div class="d-flex align-items-start">
            <img style="width:35px" class="me-2 avatar-sm rounded-circle"
                src="{{$comment->user->getImageUrl()}}" alt="Luigi Avatar">
            <div class="w-100">
                <div class="d-flex justify-content-between">
                    <a href="{{ route('showProfile', $comment->user->id) }}" class="card-title mb-0">{{$comment->user->name}}</a>
                    <small class="fs-6 fw-light text-muted"> {{$comment->created_at}} </small>
                </div>
                <p class="fs-6 mt-3 fw-light">
                    {{$comment->content}}               
                </p>
            </div>
        </div>
    @endforeach
</div>
