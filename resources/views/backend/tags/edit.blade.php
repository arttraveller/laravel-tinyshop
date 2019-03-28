@extends('layouts.backend')

@section('content')
    {!! Form::open()->route('admin.tags.update', ['id' => $tag->id])->method('PUT') !!}

        @include('backend.tags._form', [
            'name' => $tag->name,
            'slug' => $tag->slug,
        ])

    {!! Form::close() !!}
@endsection