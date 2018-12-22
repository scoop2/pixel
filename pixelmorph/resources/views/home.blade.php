@extends('layouts.master')

@section('content')
    <div class="containerContent homeText">
        <div class="homeTopWrap">
            <div class="homeTopLeftCorner"></div>
            <div class="homeTopHeadline">
                <h1 class="center">{{ $items->headline }} {{ $items->username }}</h1>
            </div>
            <div class="homeTopRightCorner"></div>
        </div>
        <div>
            <img src="{{ url('/') }}/images/shape01.png" class="shaped" />
            <p>{!! $items->body !!}</p>
        </div>
        <div class="teaserWrap">
            @if (!empty($teaser[0]->id))
                <div class="teaser teaserA">
                    <div class="homeTeaserHead">
                        <b>{{ $teaser[0]->title }}</b> ({{ $teaser[0]->released }})
                    </div>
                    <div class="labelWrap">
                        @php
                            $i = 0;
                        @endphp
                        @foreach ($teaser[0]->label as $chartlabel)
                            <div class="labelChartWrap"><i>{{ $chartlabel }}</i></diV>
                            @php
                                $i++;
                            @endphp
                        @endforeach
                    </div>
                    <img src="{{ url('/') }}/images/covers/{{ $teaser[0]->cover }}">
                    {{ $teaser[0]->description }}
                </div>
            @endif
            @if (!empty($teaser[1]->id))
                <div class="teaser teaserB">
                    <div class="homeTeaserHead">
                        <b>{{ $teaser[1]->title }}</b> ({{ $teaser[1]->released }})
                    </div>
                    <div class="labelWrap">
                        @php
                            $i = 0;
                        @endphp
                        @foreach ($teaser[1]->label as $chartlabel)
                            <div class="labelChartWrap"><i>{{ $chartlabel }}</i></diV>
                            @php
                                $i++;
                            @endphp
                        @endforeach
                    </div>
                    <img src="{{ url('/') }}/images/covers/{{ $teaser[1]->cover }}">
                    {{ $teaser[1]->description }}
                </div>
            @endif
        </div>
    </div>
<script>
    @if (!empty($teaser[0]->id))
        $('.teaserA').on('click', function(){
            window.location = "{{ url('/') }}/sound/filter/{{ $teaser[0]->id }}";
        })
    @endif
    @if (!empty($teaser[1]->id))
        $('.teaserB').on('click', function(){
            window.location = "{{ url('/') }}/sound/filter/{{ $teaser[1]->id }}";
        })
    @endif
</script>
@endsection

@section('nav')
    @component('components.nav', ['active' => '1', 'user' => $user])
    @endcomponent
@endsection
