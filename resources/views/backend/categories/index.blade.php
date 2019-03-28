@extends('layouts.backend')

@section('content')

    @include('backend.partials._nav')

    <div class="d-flex flex-row mb-2">
        <div class="mr-auto">
            @include('backend.partials._create_button', ['route' => 'admin.categories.create'])
        </div>
        <div>
            @include('backend.partials._search_form')
        </div>
    </div>

    <table class="table table-bordered table-striped">

        <thead>
            <tr>
                <th>{{ __('ID') }}</th>
                <th>{{ __('Name') }}</th>
                <th>{{ __('Slug') }}</th>
                <th>{{ __('Actions') }}</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>
                        @for ($i = 0; $i < $category->depth; $i++)⇾@endfor
                        <a href="{{ route('admin.categories.show', $category) }}">{{ $category->name }}</a>
                    </td>
                    <td>{{ $category->slug }}</td>
                    <td class="grid-action-column">
                        @include('backend.partials._actions_column', ['resource' => $category, 'resourceRouteId' => 'categories'])
                    </td>
                </tr>
            @endforeach
        </tbody>

    </table>

    {!! $categories->appends(Request::except('page'))->render() !!}
@endsection
