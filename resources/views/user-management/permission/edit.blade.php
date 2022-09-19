@extends('layouts.app')
@section('content')
<div class="container-fluid" id="app">
    <form method="POST" action="{{ route('permissions.update', $permission->id) }}">
        @csrf
        <input name="_method" type="hidden" value="PUT">
    <div class="card">
        <div class="card-header">
            <div class="card-title">Edit Permission</div>

        </div>
        <div class="card-body">


            <div class="row">
                <div class="col-6">


                    <div class="form-group">
                        {{ Form::label('Permission Name', 'Permission Name',array('class'=>'col-form-label')) }}<span class="required"></span>
                        <input class="form-control form-control-sm" placeholder="Enter a permission name" name="name" id="name" value="{{ $permission->name }}">
                        @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm ">
                        <span class="indicator-label">Submit</span>

                    </button>

                </div>


            </div>
        </div>
    </div>
    {{ Form::close() }}
</div>
@endsection
@section('scripts')

@endsection
