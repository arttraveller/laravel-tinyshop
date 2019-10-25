@extends('layouts.backend')

@section('content')

    @include('backend.partials._nav')

    <div class="d-flex flex-row mb-2">
        <div class="mr-auto">
            @include('backend.partials._create_button', ['route' => 'admin.products.create'])
        </div>
        <div>
            @include('backend.partials._search_form')
        </div>
    </div>

    <table class="table table-bordered table-striped">

        <thead>
            <tr>
                <th>@sortablelink('id',  __('ID'))</th>
                <th>@sortablelink('code',  __('Code'))</th>
                <th>@sortablelink('name',  __('Name'))</th>
                <th>@sortablelink('status',  __('Status'))</th>
                <th>@sortablelink('brand.name',  __('Brand'))</th>
                <th>@sortablelink('price',  __('Price'))</th>
                <th>{{ __('Actions') }}</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($products as $oneProduct)
                <tr>
                    <td>{{ $oneProduct->id }}</td>
                    <td>{{ $oneProduct->code }}</td>
                    <td><a href="{{ route('admin.products.show', $oneProduct) }}">{{ $oneProduct->name }}</a></td>
                    <td>{{ \App\Enums\EProductStatuses::getLabel($oneProduct->status) }}</td>
                    <td>{{ $oneProduct->brand->name }}</td>
                    <td>{{ $oneProduct->price }}</td>
                    <td class="grid-action-column">
                        @include('backend.partials._actions_column', ['resource' => $oneProduct, 'resourceRouteId' => 'products'])
                    </td>
                </tr>
            @endforeach
        </tbody>

    </table>

    {!! $products->appends(Request::except('page'))->render() !!}
@endsection
