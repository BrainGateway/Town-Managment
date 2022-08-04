@extends('layouts.app')

@section('content')
    <!--begin::Container-->
    <div id="kt_content_container" class="container">
        {{ __('Dashboard') }}

        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        {{ __('You are logged in!') }}
    </div>
    <!--end::Container-->
@endsection
