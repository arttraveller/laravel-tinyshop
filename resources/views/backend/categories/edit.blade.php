@extends('layouts.backend')

@section('content')
    {!! Form::open()->route('admin.categories.update', ['id' => $category->id])->method('PUT') !!}

        @include('backend.categories._form', [
            'categories' => $categories,
            'parentId' => $category->parent_id,
            'name' => $category->name,
            'slug' => $category->slug,
            'description' => $category->description,
            'metaTitle' => $category->meta_title,
            'metaDescription' => $category->meta_description,
            'metaKeywords' => $category->meta_keywords,
        ])

    {!! Form::close() !!}
@endsection