@extends('Layout.layout')

@section('Content')
    <div class="row">
        <div class="col-3">
            @include('shared.left_slidebar')
        </div>
        <div class="col-6">
            @include('shared.success_message')
            @include('shared.submit_idea')
            <hr>
                @forelse ($ideas as $Idea)
                    <div class="mt-3">
                        @include('shared.idea_card')
                    </div>
                    @empty
                    <p class="text-center mt-4">No Results Found.</p>
                @endforelse
            <div class="mt-3">
                {{ $ideas->withQueryString()->links() }}
            </div>
        </div>
        <div class="col-3">
            @include('shared.search_bar')
            @include('shared.follow_box')
        </div>
    </div>
@endsection
