@extends('layouts.backend')

@section('content')

    <div class="row">
        <div class="col-12">
            <a href="{{ route('admin.attributes.edit', ['id' => $attribute->id]) }}" class="btn btn-sm btn-warning" data-toggle="tooltip" title="{{ __('Edit') }}">
                {{ __('Edit') }}
            </a>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-12">
            <table class="table table-bordered">
                <thead></thead>
                <tbody>
                    <tr>
                        <th>{{ __('Name') }}</th>
                        <td>{{ $attribute->name }}</td>
                    </tr>
                    <tr>
                        <th>{{ __('Type') }}</th>
                        <td>{{ \App\Enums\EAttributeTypes::getLabel($attribute->type) }}</td>
                    </tr>
                    <tr>
                        <th>{{ __('Required') }}</th>
                        <td>{{ \App\Enums\EBool::getLabel($attribute->is_required) }}</td>
                    </tr>
                    <tr>
                        <th>{{ __('Default value') }}</th>
                        <td>{{ strlen($attribute->default_value) > 0 ? $attribute->default_value : '-' }}</td>
                    </tr>
                    <tr>
                        <th>{{ __('Variants') }}</th>
                        <td>{{ $attribute->variants }}</td>
                    </tr>
                    <tr>
                        <th>{{ __('Sort') }}</th>
                        <td>{{ $attribute->sort }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

@endsection
