@extends('Layout.app')
@section('title', "Home")

@section('trending')
    @include('Component.Trending')
@endsection

@section('content')
{{--        @include('Component.AdvertiseModal') --}}


        <div class="py-2 d-flex justify-content-center">
            <img src="https://tpc.googlesyndication.com/simgad/14287566647477718716"/>
        </div>

        @include('Component.FirstLead')
        @include('Component.SecondLead')
{{--        @include('Component.AdvertiseBottomFixed') --}}
@endsection