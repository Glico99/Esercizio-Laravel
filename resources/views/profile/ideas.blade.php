 @foreach ($user->ideas as $idea)
     <div class="mt-3 mx-5">
         <div class="card">
             <div class="px-3 pt-4 pb-2">
                 <div class="d-flex align-items-center justify-content-between">
                     <div class="d-flex align-items-center">
                         <img style="width:50px" class="me-2 avatar-sm rounded-circle"
                             src="{{$user->getImageUrl()}}"
                             alt="Mario Avatar">
                         <div>
                             <h5 class="card-title mb-0"><a href="{{ route('showProfile', $idea->user->id) }}"> {{ $idea->user->name }}</a></h5>
                         </div>
                     </div>
                     @auth
                         @if (Auth::user()->id == $idea->user_id)
                             <a href="{{ route('showIdea', $idea->id) }}">Show</a>
                             <a href="{{ route('editIdea', $idea->id) }}">Edit</a>
                             <form action="{{ route('deleteIdea', $idea->id) }}" method="post">
                                 @csrf
                                 @method('delete')
                                 <button class="btn btn-sm btn-danger">X</button>
                             </form>
                         @endif
                     @endauth

                 </div>
             </div>
             <div class="card-body">
                 <p class="fs-6 fw-light text-muted">
                     {{ $idea->content }}
                 </p>
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
                 @include('comments.comments')
             </div>
         </div>
     </div>
 @endforeach
