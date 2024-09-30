@auth
    <form action="{{ route('shareComment', $idea->id) }}" method="post">
        @csrf
        <div class="mb-3">
            <input type="text" class="fs-6 form-control" name="comment" rows="1"></input>
        </div>
        <div>
            <input type="submit" class="btn btn-primary btn-sm" value="Post Comment"></input>
        </div>
    </form>
@endauth
