@extends('layouts.single')
@section('single')
    @if(isset($videos))
            <div class="s-top-grid-left-img">
                <div>
                    <iframe src="{{ $videos->video }}"
                            style="width:625px;height: 416px"></iframe>
                </div>
                <div class="single-img-grid">
                    <div class="s-author">
                        {{--<p><a href="#"><i class="fa fa-comments" aria-hidden="true"></i> Comments (10)</a></p>--}}
                        {{ $videos->title }}
                    </div>
                    <div class="s-para">
                        <p>{{ $videos->description}}
                        </p>
                    </div>
                </div>
            </div>
    @endif
    @endsection