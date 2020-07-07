@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Update Password</h3>
                </div>
                {!! Form::open(['route' => 'update-password', 'method' => 'POST']) !!}
                <div class="box-body">
                    <div class="form-group">
                        <label for="">Current Password</label>
                        <input type="password" name="current_password" placeholder="Enter current password" class="form-control">
                        <span class="text-danger"></span>
                    </div>
                    <div class="form-group">
                        <label for="">New Password</label>
                        <input type="password" name="password" placeholder="Enter new password" class="form-control">
                        <span class="text-danger"></span>
                    </div>
                    <div class="form-group">
                        <label for="">Confirm Password</label>
                        <input type="password" name="password_confirmation" placeholder="Enter confirm password" class="form-control">
                        <span class="text-danger"></span>
                    </div>
                </div>
                <div class="box-footer">
                    <button class="btn btn-sm btn-danger" onclick="submit_form(this, event)">Update password</button>    
                </div>                
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection