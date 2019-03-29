@extends('layouts.backend')

@section('content')
    {!! Form::open()->route('admin.brands.store') !!}

        @include('backend.brands._form', [
            'name' => '',
            'slug' => '',
            'metaTitle' => '',
            'metaDescription' => '',
            'metaKeywords' => '',
        ])

    {!! Form::close() !!}
@endsection