@extends('layouts.backend')

@section('content')

    @include('backend.partials._nav')

    <div class="mb-2">
        @include('backend.partials._create_button', ['route' => 'admin.brands.create'])
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
                    <td>{{ $brand->name }}</td>
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
