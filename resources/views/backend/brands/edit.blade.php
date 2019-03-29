@extends('layouts.backend')

@section('content')
    {!! Form::open()->route('admin.brands.update', ['id' => $brand->id])->method('PUT') !!}

        @include('backend.brands._form', [
            'name' => $brand->name,
            'slug' => $brand->slug,
            'metaTitle' => $brand->meta_title,
            'metaDescription' => $brand->meta_description,
            'metaKeywords' => $brand->meta_keywords,
        ])

    {!! Form::close() !!}
@endsection