@extends('layouts.backend')

@section('content')

    @include('backend.partials._nav')

    <div class="d-flex flex-row mb-2">
        <div class="mr-auto">
            @include('backend.partials._create_button', ['route' => 'admin.brands.create'])
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
            @foreach ($brands as $brand)
                <tr>
                    <td>{{ $brand->id }}</td>
                    <td><a href="{{ route('admin.brands.show', $brand) }}">{{ $brand->name }}</a></td>
                    <td>{{ $brand->slug }}</td>
                    <td class="grid-action-column">
                        @include('backend.partials._actions_column', ['resource' => $brand, 'resourceRouteId' => 'brands'])
                    </td>
                </tr>
            @endforeach
        </tbody>

    </table>

    {!! $brands->appends(Request::except('page'))->render() !!}
@endsection
