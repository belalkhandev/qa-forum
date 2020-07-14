@extends('layouts.master')

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">User List ({{ count($questions) }})</h3>
            {{-- <a href="{{ route('category.create') }}" class="btn btn-sm btn-primary float-right">Create new</a> --}}
        </div>
        <div class="box-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
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
                                <td>{{ $question->title }}</td>
                                <td>{{ count($question->answers) }}</td>
                                
                                <td class="inline-element">
                                    
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
