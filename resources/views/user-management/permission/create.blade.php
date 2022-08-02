@extends('layouts.app')


@section('content')
<div class="container-fluid" id="app">

    <div class="card">
        <div class="card-header">
            <div class="card-title">Create Permission</div>
            <span class="float-right mt-4">

        </div>
        <form method="POST" action="{{ route('permissions.store') }}">
            @csrf
        <div class="card-body">
            <input type='hidden' id='values' name='values' />

            <div class="row">
                <div class="col-6">

                    <div class="form-group">
                        {{ Form::label('Permission Name', 'Permission Name',array('class'=>'col-form-label')) }}<span class="required"> </span>
                        {{ Form::text('name', Request::old('name'), array('class' => 'form-control form-control-sm')) }}
                        @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                    </div>

                </div>
                <div class="card-footer">

                    <button type="submit" class="btn btn-primary btn-sm ">
                       Submit

                    </button>
                </div><!-- card footer end -->
            </div>

        </div>
    </div>
    {{ Form::close() }}
</div>
@endsection
@section('postjs')
<script src="{{ asset('metronic/plugins/global/plugins.bundle.js') }}"></script>
<script>
    var app = new Vue({
        el: "#app",

        methods: {

            submit(){
                $('#values').val(JSON.stringify(this.select_rows));
            }
        }
    });
</script>
@endsection
