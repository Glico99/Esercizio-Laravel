@guest
    <h4> Log in to share yours ideas </h4>
@endguest
@auth
    <h4> Share yours ideas </h4>
    <form action="{{ route('shareIdea') }}" method="post" id="ideaform">
        @csrf
        <div class="row">
            <div class="mb-3">
                <textarea class="form-control" name="idea" id="idea" rows="3"></textarea>
            </div>
            <div class="">
                <button class="btn btn-dark"> Share </button>
            </div>
        </div>
    </form>
@endauth
