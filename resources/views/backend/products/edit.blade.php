@extends('layouts.backend')

@section('content')
    {!! Form::open()->route('admin.products.update', ['id' => $product->id])->method('PUT') !!}

        @include('backend.products._form', [
            'allBrands' => $allBrands,
            'allCategories' => $allCategories,
            'allStatuses' => \App\Enums\EProductStatuses::getLabels(),

            'code' => $product->code,
            'name' => $product->name,
            'description' => $product->description,
            'status' => $product->status,
            'brandId' => $product->brand_id,
            'price' => $product->price,
            'oldPrice' => $product->old_price,

            'currentCategories' => Arr::pluck($product->categories->all(), 'name', 'id'),
            'currentTags' => Arr::pluck($product->tags->all(), 'name', 'id'),
            'currentCharacteristics' => $currentCharacteristics,

            'metaTitle' => $product->meta_title,
            'metaDescription' => $product->meta_description,
            'metaKeywords' => $product->meta_keywords,
        ])

    {!! Form::close() !!}
@endsection
