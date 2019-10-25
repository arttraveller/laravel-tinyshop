@extends('layouts.backend')

@section('content')
    {!! Form::open()->route('admin.characteristics.update', ['id' => $characteristic->id])->method('PUT') !!}

        @include('backend.characteristics._form', [
            'charTypes' => \App\Enums\ECharacteristicTypes::getLabels(),
            'boolValues' => \App\Enums\EBool::getLabels(),
            'name' => $characteristic->name,
            'type' => $characteristic->type,
            'isRequired' => $characteristic->is_required,
            'defaultValue' => $characteristic->default_value,
            'variants' => $characteristic->variants,
            'sort' => $characteristic->sort,
        ])

    {!! Form::close() !!}
@endsection
