@extends('layouts.backend')

@section('content')
    {!! Form::open()->route('admin.characteristics.store') !!}

        @include('backend.characteristics._form', [
            'charTypes' => \App\Shop\Enums\ECharacteristicTypes::getLabels(),
            'boolValues' => \App\Enums\EBool::getLabels(),
            'name' => null,
            'type' => \App\Shop\Enums\ECharacteristicTypes::STRING,
            'isRequired' => 0,
            'defaultValue' => null,
            'variants' => null,
            'sort' => null,
        ])

    {!! Form::close() !!}
@endsection