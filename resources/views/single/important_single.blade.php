@extends('layouts.single')
@section('single')
    @if(isset($important))
        <div class="s-top-grid-left-img">
            @if(isset($important->video))
                <div>
                    <iframe src="{{ $important->video }}"
                            style="width:625px;height: 416px"></iframe>
                </div>
            @else
                <img src="{{ asset('image/'. $important->image )}}" style="width:625px;height: 416px">
            @endif
            <div class="single-img-grid">
                <div class="s-author">
                    {{--<p><a href="#"><i class="fa fa-comments" aria-hidden="true"></i> Comments (10)</a></p>--}}
                    {{ $important->title }}
                </div>
                <div class="s-para">
                    <p>{{ $important->description}}
                    </p>
                </div>
            </div>
        </div>
    @endif
@endsection