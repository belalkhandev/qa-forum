@extends('layouts.master')

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Questions ({{ count($questions) }})</h3>
            {{-- <a href="{{ route('category.create') }}" class="btn btn-sm btn-primary float-right">Create new</a> --}}
        </div>
        <div class="box-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>User</th>
                        <th>Title</th>
                        <th>Answer</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @if($questions)
                        @foreach ($questions as $key => $question)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>
                                    @if($question->user->profile->photo)
                                        <img src="{{ asset($question->user->profile->photo) }}" alt="" class="userPhoto">
                                    @endif
                                    <span class="userName">{{ $question->user->name }}</span>
                                </td>
                                <td>{{ $question->title }}</td>
                                <td><a href="{{ route('topic.question.answer', $question->id) }}" class="btn btn-primary btn-sm ">Answers ({{ count($question->answers) }}</a></td>                                
                                <td class="inline-element">
                                    <a href="{{ route('topic.question.show', $question->id) }}" data-toggle="tooltip" title="Delete" data-placement="top" class="custom-btn-sm btn btn-primary"><i class="fas fa-eye"></i></a>
                                    
                                    {!! Form::open(['route' => ['topic.question.destroy', $question->id], 'method' => 'DELETE', 'class'=>'inline-el']) !!}
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
        <div class="box-footer">{{ $questions->links() }}</div>
    </div>
@endsection
