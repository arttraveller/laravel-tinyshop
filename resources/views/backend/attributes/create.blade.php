@extends('layouts.backend')

@section('content')
    {!! Form::open()->route('admin.attributes.store') !!}

        @include('backend.attributes._form', [
            'charTypes' => \App\Enums\EAttributeTypes::getLabels(),
            'boolValues' => \App\Enums\EBool::getLabels(),
            'name' => null,
            'type' => \App\Enums\EAttributeTypes::STRING,
            'isRequired' => 0,
            'defaultValue' => null,
            'variants' => null,
            'sort' => null,
        ])

    {!! Form::close() !!}
@endsection
