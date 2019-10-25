@extends('layouts.backend')

@section('content')

    <div class="row">
        <div class="col-12">
            <a href="{{ route('admin.characteristics.edit', ['id' => $characteristic->id]) }}" class="btn btn-sm btn-warning" data-toggle="tooltip" title="{{ __('Edit') }}">
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
                        <td>{{ $characteristic->name }}</td>
                    </tr>
                    <tr>
                        <th>{{ __('Type') }}</th>
                        <td>{{ \App\Enums\ECharacteristicTypes::getLabel($characteristic->type) }}</td>
                    </tr>
                    <tr>
                        <th>{{ __('Required') }}</th>
                        <td>{{ \App\Enums\EBool::getLabel($characteristic->is_required) }}</td>
                    </tr>
                    <tr>
                        <th>{{ __('Default value') }}</th>
                        <td>{{ strlen($characteristic->default_value) > 0 ? $characteristic->default_value : '-' }}</td>
                    </tr>
                    <tr>
                        <th>{{ __('Variants') }}</th>
                        <td>{{ $characteristic->variants }}</td>
                    </tr>
                    <tr>
                        <th>{{ __('Sort') }}</th>
                        <td>{{ $characteristic->sort }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

@endsection
