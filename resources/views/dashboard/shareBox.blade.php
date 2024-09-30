@guest
    <h4> Log in to share yours ideas </h4>
@endguest
@auth
    <h4> Share yours ideas </h4>
    <form action="{{ route('shareIdea') }}" method="post" id="ideaform">
        @csrf
        <div class="row">
            <div class="mb-3">
                <input type="text" class="form-control" name="idea" id="idea" rows="3"></input>
            </div>
            <div class="">
                <input type="submit" class="btn btn-dark" value="Share"></input>
            </div>
        </div>
    </form>
@endauth
