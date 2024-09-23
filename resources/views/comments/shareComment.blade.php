@auth
    <form action="{{ route('shareComment', $idea->id) }}" method="post">
        @csrf
        <div class="mb-3">
            <textarea class="fs-6 form-control" name="comment" rows="1"></textarea>
        </div>
        <div>
            <button class="btn btn-primary btn-sm"> Post Comment </button>
        </div>
    </form>
@endauth
