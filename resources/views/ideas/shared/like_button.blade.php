<div>
    @auth
    @if (Auth::user()->likesIdea($Idea))
        <form method="POST" action=" {{ route('idea.unlike', $Idea->id) }} ">
            @csrf
            <button type="submit" class="fw-light nav-link fs-6"> <span class="fas fa-heart me-1">
                </span> {{ $Idea->likes()->count() }} </button>
        </form>
    @else
        <form method="POST" action=" {{ route('idea.like', $Idea->id) }} ">
            @csrf
            <button type="submit" class="fw-light nav-link fs-6"> <span class="far fa-heart me-1">
                </span> {{ $Idea->likes()->count() }} </button>
        </form>
    @endif
    @endauth
    @guest
    <a href=" {{ route('login') }} " class="fw-light nav-link fs-6"> <span class="far fa-heart me-1">
    </span> {{ $Idea->likes()->count() }} </a>
    @endguest
</div>
