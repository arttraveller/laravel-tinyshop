@extends('layouts.backend')

@section('content')
    {!! Form::open()->route('admin.products.store') !!}

        @include('backend.products._form', [
            'allBrands' => $allBrands,
            'allCategories' => $allCategories,
            'allAttributes' => $allAttributes,
            'allStatuses' => \App\Enums\EProductStatuses::getLabels(),

            'code' => null,
            'name' => null,
            'description' => null,
            'status' => null,
            'brandId' => null,
            'price' => null,
            'oldPrice' => null,

            'currentCategories' => [],
            'currentTags' => [],
            'currentAttributes' => [],

            'metaTitle' => null,
            'metaDescription' => null,
            'metaKeywords' => null,
        ])

    {!! Form::close() !!}
@endsection
