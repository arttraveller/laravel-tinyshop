@extends('layouts.backend')

@section('content')

    @include('backend.partials._nav')

    <div class="d-flex flex-row mb-2">
        <div class="mr-auto">
            @include('backend.partials._create_button', ['route' => 'admin.tags.create'])
        </div>
        <div>
            @include('backend.partials._search_form')
        </div>
    </div>

    <table class="table table-bordered table-striped">

        <thead>
            <tr>
                <th>@sortablelink('id',  __('ID'))</th>
                <th>@sortablelink('name',  __('Name'))</th>
                <th>@sortablelink('slug',  __('Slug'))</th>
                <th>{{ __('Actions') }}</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($tags as $tag)
                <tr>
                    <td>{{ $tag->id }}</td>
                    <td><a href="{{ route('admin.tags.show', $tag) }}">{{ $tag->name }}</a></td>
                    <td>{{ $tag->slug }}</td>
                    <td class="grid-action-column">
                        @include('backend.partials._actions_column', ['resource' => $tag, 'resourceRouteId' => 'tags'])
                    </td>
                </tr>
            @endforeach
        </tbody>

    </table>

    {!! $tags->appends(Request::except('page'))->render() !!}
@endsection
