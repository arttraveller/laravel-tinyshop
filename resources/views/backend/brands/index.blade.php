@extends('layouts.backend')

@section('content')

    @include('backend.partials._nav')

    <p>
        <a href="{{ route('admin.brands.create') }}" class="btn btn-success">{{ __('Create') }}</a>
    </p>

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
                        @include('backend.partials._act-column', ['resource' => $brand, 'resourceRouteId' => 'brands'])
                    </td>
                </tr>
            @endforeach
        </tbody>

    </table>

    {{ $brands->links() }}
@endsection
