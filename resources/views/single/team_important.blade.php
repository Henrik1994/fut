@extends('layouts.single')
@section('single')
    @if(isset($team_important))
        <div class="s-top-grid-left-img">
            @if(isset($team_important->video))
                <div>
                    <iframe src="{{ $team_important->video }}"
                            style="width:625px;height: 416px"></iframe>
                </div>
            @else
                <img src="{{ asset('image/'. $team_important->image )}}" style="width:625px;height: 416px">
            @endif
            <div class="single-img-grid">
                <div class="s-author">
                    {{--<p><a href="#"><i class="fa fa-comments" aria-hidden="true"></i> Comments (10)</a></p>--}}
                    {{ $team_important->title }}
                </div>
                <div class="s-para">
                    <p>{{ $team_important->description}}
                    </p>
                </div>
            </div>
        </div>
    @endif
@endsection