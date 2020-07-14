@extends('layouts.master')

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">User List ({{ count($answers) }})</h3>
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
                    @if($answers)
                        @foreach ($answers as $key => $answer)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $answer->question->title }}</td>
                                <td>{{ $answer->description }}</td>
                                <td class="inline-element">
                                    
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
