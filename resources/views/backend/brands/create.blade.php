@extends('layouts.backend')

@section('content')
    {!! Form::open()->route('admin.brands.store') !!}

        @include('backend.brands._form', [
            'name' => '',
            'slug' => '',
            'seoTitle' => '',
            'seoDescription' => '',
            'seoKeywords' => '',
        ])

    {!! Form::close() !!}
@endsection