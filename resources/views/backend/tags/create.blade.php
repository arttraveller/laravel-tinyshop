@extends('layouts.backend')

@section('content')
    {!! Form::open()->route('admin.tags.store') !!}

        @include('backend.tags._form', [
            'name' => '',
            'slug' => '',
        ])

    {!! Form::close() !!}
@endsection