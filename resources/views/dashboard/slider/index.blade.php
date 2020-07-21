@extends('layouts.master')

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Slider List</h3>
            <a href="{{ route('slider.create') }}" class="btn btn-sm btn-primary float-right">Add new</a>
        </div>
        <div class="box-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Slide Image</th>
                        <th>Title</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @if($sliders->isNotEmpty())
                        @foreach ($sliders as $key => $slider)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td><img src="{{ asset($slider->slider) }}" class="slide-img" alt=""></td>
                                <td>{{ $slider->title }}</td>
                                <td>{!! styleStatus($slider->status) !!}</td>
                                <td class="inline-element">
                                    <a href="{{ route('slider.edit', $slider->id) }}" data-toggle="tooltip" title="Edit" data-placement="top" class="custom-btn-sm btn btn-primary"><i class="fas fa-edit"></i></a>
                                    {!! Form::open(['route' => ['slider.destroy', $slider->id], 'method' => 'DELETE', 'class'=>'inline-el']) !!}
                                        <button type="submit" class="btn btn-danger custom-btn-sm" onclick="deleteSwal(this, event)" data-toggle="tooltip" title="Delete" data-placement="top">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                    @else                         
                        <tr>
                            <td colspan="5">No Sliders found</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
        <div class="box-footer"></div>
    </div>
@endsection
