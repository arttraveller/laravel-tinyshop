@extends('layouts.backend')

@section('content')

    @include('backend.partials._nav')

    <div class="mb-2">
        @include('backend.partials._create_button', ['route' => 'admin.brands.create'])
    </div>

    <table class="table table-bordered table-striped">

        <thead>
            <tr>
                <th>{{ __('ID') }}</th>
                <th>{{ __('Name') }}</th>
                <th>{{ __('Slug') }}</th>
                <th></th>
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

    {{ $brands->links() }}
@endsection
