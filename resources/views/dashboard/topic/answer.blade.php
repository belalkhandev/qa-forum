@extends('layouts.master')

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Answer List ({{ count($answers) }})</h3>
            {{-- <a href="{{ route('category.create') }}" class="btn btn-sm btn-primary float-right">Create new</a> --}}
        </div>
        <div class="box-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>User</th>
                        <th>Question</th>
                        <th>Answer</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @if($answers)
                        @foreach ($answers as $key => $answer)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>
                                    @if($answer->user->profile->photo)
                                        <img src="{{ asset($answer->user->profile->photo) }}" alt="" class="userPhoto">
                                    @endif
                                    <span class="userName">{{ $answer->user->name }}</span>
                                </td>
                                <td>{{ $answer->question->title }}</td>
                                <td>{{ Str::limit($answer->description, 50, '.......') }}</td>
                                <td class="inline-element">
                                    <a href="{{ route('fr.topic.show', $answer->question->id) }}" data-toggle="tooltip" title="Delete" data-placement="top" class="custom-btn-sm btn btn-primary"><i class="fas fa-eye"></i></a>
                                    
                                    {!! Form::open(['route' => ['topic.answer.destroy', $answer->id], 'method' => 'DELETE', 'class'=>'inline-el']) !!}
                                        <button type="submit" class="btn btn-danger custom-btn-sm" onclick="deleteSwal(this, event)" data-toggle="tooltip" title="Delete" data-placement="top">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
        <div class="box-footer">{{ $answers->links() }}</div>
    </div>
@endsection
