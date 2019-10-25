@extends('layouts.backend')

@section('content')
    {!! Form::open()->route('admin.products.store') !!}

        @include('backend.products._form', [
            'code' => null,
            'name' => null,
            'description' => null,
            'productStatuses' => \App\Enums\EProductStatuses::getLabels(),
            'status' => null,
            'productCategories' => $productCategories,
            'mainCategoryId' => null,
            'productBrands' => $productBrands,
            'brandId' => null,

            'metaTitle' => null,
            'metaDescription' => null,
            'metaKeywords' => null,
        ])

    {!! Form::close() !!}
@endsection
