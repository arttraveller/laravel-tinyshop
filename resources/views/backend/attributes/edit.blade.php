@extends('layouts.backend')

@section('content')
    {!! Form::open()->route('admin.attributes.update', ['id' => $attribute->id])->method('PUT') !!}

        @include('backend.attributes._form', [
            'charTypes' => \App\Enums\EAttributeTypes::getLabels(),
            'boolValues' => \App\Enums\EBool::getLabels(),
            'name' => $attribute->name,
            'type' => $attribute->type,
            'isRequired' => $attribute->is_required,
            'defaultValue' => $attribute->default_value,
            'variants' => $attribute->variants,
            'sort' => $attribute->sort,
        ])

    {!! Form::close() !!}
@endsection
