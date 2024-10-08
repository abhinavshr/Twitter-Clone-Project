<div class="card">
    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img style="width:50px" class="me-2 avatar-sm rounded-circle"
                    src="{{ $Idea->user->getImageURL() }}" alt="{{ $Idea->user->name }}">
                <div>
                    <h5 class="card-title mb-0"><a href=" {{ route('users.show', $Idea->user->id) }} "> {{ $Idea->user->name }}
                        </a></h5>
                </div>
            </div>
            <div>
                <form method="POST" action="{{ route('idea.destroy', $Idea->id) }}">
                    @csrf
                    @method('delete')
                    <a class="mx-2" href="{{ route('idea.edit', $Idea->id) }}">Edit</a>
                    <a href="{{ route('idea.show', $Idea->id) }}">View</a>
                    <button class="ms-1 btn btn-danger btn-sm">X</button>
                </form>
            </div>
        </div>
    </div>
    <div class="card-body">
        @if ($editing ??false)
        <form action="{{ route('idea.update', $Idea->id) }}" method="post">
            @csrf
            @method('put')
            <div class="mb-3">
                <textarea name="content" class="form-control" id="content" rows="3">{{ $Idea->content }}</textarea>
                @error('content')
                    <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                @enderror
            </div>
            <div class="">
                <button type="submit" class="btn btn-dark mb-2 btn-sm"> Update </button>
            </div>
        </form>
        @else
            <p class="fs-6 fw-light text-muted">
                {{ $Idea->content }}
            </p>
        @endif
        <div class="d-flex justify-content-between">
            @include('ideas.shared.like_button')
            <div>
                <span class="fs-6 fw-light text-muted"> <span class="fas fa-clock"> </span>
                    {{ $Idea->created_at }} </span>
            </div>
        </div>
        @include('shared.comment_box')
    </div>
</div>
