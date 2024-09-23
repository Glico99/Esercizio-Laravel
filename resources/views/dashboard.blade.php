@extends('shared.layout')
@section('content')
    <div class="container py-4">
        <div class="row">
            @include('dashboard.navList')
            <div class="col-6">
                @include('dashboard.flashMsg')
                @include('dashboard.shareBox')
                <hr>
                @include('dashboard.ideas')
            </div>
            <div class="col-3">
                @include('dashboard.searchBox')
                @include('dashboard.followBox')
            </div>
        </div>
    </div>
@endsection
