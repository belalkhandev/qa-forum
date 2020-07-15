@extends('layouts.master')

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Show Question</h3>
        </div>
        <div class="box-body">
            <table class="table">
                <thead>
                    <tr>
                        <th style="width:150px">User</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @if($question)
                            <tr>
                                <td>
                                    @if($question->user->profile->photo)
                                        <img src="{{ asset($question->user->profile->photo) }}" alt="" class="userPhoto">
                                    @endif
                                    <span class="userName">{{ $question->user->name }}</span>
                                </td>
                                <td>{{ $question->title }}</td>
                                <td>{{ $question->description }}</td>                                
                                <td class="inline-element">
                                    {!! Form::open(['route' => ['topic.question.destroy', $question->id], 'method' => 'DELETE', 'class'=>'inline-el']) !!}
                                        <button type="submit" class="btn btn-danger custom-btn-sm" onclick="deleteSwal(this, event)" data-toggle="tooltip" title="Delete" data-placement="top">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                    @endif
                </tbody>
            </table>
        </div>
        <div class="box-footer"></div>
    </div>
@endsection
