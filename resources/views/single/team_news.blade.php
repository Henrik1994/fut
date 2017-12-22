@extends('layouts.single')
@section('single')
    @if(isset($news))
        <div class="s-top-grid-left-img">
            @if(isset($news->video))
                <div>
                    <iframe src="{{ $news->video }}"
                            style="width:625px;height: 416px"></iframe>
                </div>
            @else
                <img src="{{ asset('image/'. $news->image )}}" style="width:625px;height: 416px">
            @endif
            <div class="single-img-grid">
                <div class="s-author">
                    {{--<p><a href="#"><i class="fa fa-comments" aria-hidden="true"></i> Comments (10)</a></p>--}}
                    {{ $news->title }}
                </div>
                <div class="s-para">
                    <p>{{ $news->description}}
                    </p>
                </div>
            </div>
        </div>
    @endif
@endsection