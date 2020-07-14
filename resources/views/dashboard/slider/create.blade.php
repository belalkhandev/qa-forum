@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Add new slider</h3>
                    <a href="{{ route('slider.list') }}" class="btn btn-sm btn-secondary float-right">Slider List</a>
                </div>
                {!! Form::open(['route' => 'slider.store', 'method' => 'POST']) !!}
               
                    <div class="box-body">
                        <div class="form-group">
                            <label for="">Title</label>
                            <input type="text" name="slider_title" class="form-control" placeholder="Enter slider title">
                            <span class="text-danger">{{ $errors->first('slider_title') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="">Slider Image</label>
                            <input type="file" name="slider_image" class="form-control no-border">
                            <span class="text-danger">{{ $errors->first('slider_image') }}</span>
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
