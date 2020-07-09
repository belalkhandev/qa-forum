@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Create New Sub Category</h3>
                    <a href="{{ route('sub-category.list') }}" class="btn btn-sm btn-secondary float-right">Class List</a>
                </div>
                {!! Form::open(['route' => 'sub-category.store', 'method' => 'POST']) !!}

                <div class="box-body">                    
                    <div class="form-group">
                        <label for="">Cateogory</label>
                        {!! Form::select('category', makeDropdownList($categories), null, ['placeholder' => 'Select Category', 'class' => 'form-control']) !!}
                        <span class="text-danger">{{ $errors->first('category') }}</span>
                    </div>
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter name">
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    </div>
                    <div class="form-group">
                        <label for="">Status</label>
                        {!! Form::select('status', getStatus(), 1, ['placeholder' => 'Select Status', 'class' => 'form-control']) !!}
                        <span class="text-danger">{{ $errors->first('status') }}</span>
                    </div>
                </div>
                <div class="box-footer">
                    <button class="btn btn-sm btn-primary" onclick="submit_form(this, event)">Save</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
