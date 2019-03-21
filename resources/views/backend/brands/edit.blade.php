@extends('layouts.backend')

@section('content')
    {!! Form::open()->route('admin.brands.update', ['id' => $brand->id])->method('PUT') !!}

        @include('backend.brands._form', [
            'name' => $brand->name,
            'slug' => $brand->slug,
            'seoTitle' => $brand->title,
            'seoDescription' => $brand->description,
            'seoKeywords' => $brand->keywords,
        ])

    {!! Form::close() !!}
@endsection