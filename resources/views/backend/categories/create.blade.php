@extends('layouts.backend')

@section('content')
    {!! Form::open()->route('admin.categories.store') !!}

        @include('backend.categories._form', [
            'categories' => $categories,
            'parentId' => null,
            'name' => '',
            'slug' => '',
            'description' => '',
            'metaTitle' => '',
            'metaDescription' => '',
            'metaKeywords' => '',
        ])

    {!! Form::close() !!}
@endsection