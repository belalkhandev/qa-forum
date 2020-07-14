@extends('layouts.master')

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">User List ({{ count($users) }})</h3>
            {{-- <a href="{{ route('category.create') }}" class="btn btn-sm btn-primary float-right">Create new</a> --}}
        </div>
        <div class="box-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Education</th>
                        <th>Address</th>
                        <th>District</th>
                        <th>Joined</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @if($users)
                        @foreach ($users as $key => $user)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->profile->qualification }}</td>
                                <td>{{ $user->profile->address }}</td>
                                <td>{{ $user->profile->district }}</td>
                                <td>{{ user_formatted_date($user->created_at) }}</td>
                                <td>{!! styleStatus($user->status) !!}</td>
                                
                                <td class="inline-element">
                                    @if ($user->status == 1) 
                                    {!! Form::open(['route' => ['user.deactive', $user->id], 'method' => 'DELETE', 'class'=>'inline-el']) !!}
                                        <button type="submit" class="btn btn-success custom-btn-sm" onclick="userActivate(this, event)" data-toggle="tooltip" title="Deactive" data-placement="top">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    {!! Form::close() !!}
                                    @else 
                                    {!! Form::open(['route' => ['user.active', $user->id], 'method' => 'DELETE', 'class'=>'inline-el']) !!}
                                        <button type="submit" class="btn btn-danger custom-btn-sm" onclick="userActivate(this, event)" data-toggle="tooltip" title="Delete" data-placement="top">
                                            <i class="fas fa-check"></i>
                                        </button>
                                    {!! Form::close() !!}
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
        <div class="box-footer">{{ $users->links() }}</div>
    </div>
@endsection
