@extends('layouts.app')

@section('content')
<div class="container-fluid" id="app">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    @if(Session::has('message'))
    <div class="alert alert-success">
        {{ Session::get('message') }}
        @php
        Session::forget('message');
        @endphp
    </div>
    @endif
    <div class="card">
        <div class="card-header">
            <div class="card-title">Show Attribute</div>
        </div>
        <div class="card-body">
            {{ Form::model($attribute, array('route' => array('attributes.update', $attribute->id), 'method' => 'PUT')) }}

            <input type='hidden' id='values' name='values' />

            <div class="row">
                <div class="col-6">

                    <div class="form-group">
                        {{ Form::label('category_id', 'Select Category Name',array('class'=>'col-form-label')) }}<span class="required"></span>
                        {{ Form::select('category_id', $categories,Request::old('category_id') , array('class' => 'form-control form-control-sm','disabled')) }}
                        @if ($errors->has('category_id'))
                        <span class="text-danger">{{ $errors->first('category_id') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        {{ Form::label('type', 'Select Type',array('class'=>'col-form-label')) }}<span class="required"></span>
                        {{ Form::select('type',['text'=>'Text','select'=>'Select','checkbox'=>'Checkbox','radio'=>'Radio'],Request::old('type') , array('class' => 'form-control form-control-sm','@change'=>'onChange($event)','disabled')) }}

                        @if ($errors->has('type'))
                        <span class="text-danger">{{ $errors->first('type') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        {{ Form::label('title', 'Title',array('class'=>'col-form-label')) }}<span class="required"></span>
                        {{ Form::text('title', Request::old('title'), array('class' => 'form-control form-control-sm','disabled')) }}
                        @if ($errors->has('title'))
                        <span class="text-danger">{{ $errors->first('title') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        {{ Form::label('lang', 'Select Language',array('class'=>'col-form-label')) }}<span class="required"></span>
                        {{ Form::select('lang',['EN'=>'English','AR'=>'Arabic'],Request::old('lang') , array('class' => 'form-control form-control-sm','disabled')) }}

                        @if ($errors->has('lang'))
                        <span class="text-danger">{{ $errors->first('lang') }}</span>
                        @endif
                    </div>

                </div>

                <div class="col-6">
                    <div v-show="show_select" class="table-responsive">
                        <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4 datatable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Value Name (En)</th>
                                    <th>Value Name (Ar)</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(row,index) in select_rows" :key="index">
                                    <td>@{{index+1}}</td>
                                    <td><input type="text" class="form-control form-control-sm" name="values2[en][]"  v-model="row.name_en" disabled></td>
                                    <td><input type="text" class="form-control form-control-sm" name="values2[ar][]" v-model="row.name_ar" disabled></td>
                                    <td>
                                        <a type="button" @click="removeRow(index)" class="btn btn-icon btn-bg-light delete-btn btn-active-color-primary btn-sm me-1 disabled" data-bs-toggle="tooltip" data-bs-custom-class="tooltip-dark" data-bs-placement="top" title="Delete">
                                            <span class="svg-icon svg-icon-3 svg-icon-danger">
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24"></rect>
                                                        <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"></path>
                                                        <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"></path>
                                                    </g>
                                                </svg>
                                            </span>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div>
                            <a class="btn btn-pill btn-success disabled" role='button' @click="addRow" >Add row</a>
                        </div>
                    </div>
                </div>
            </div>


            {{ Form::close() }}

        </div>
    </div>
</div>
@endsection
@section('scripts')

@endsection
