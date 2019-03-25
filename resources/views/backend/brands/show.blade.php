@extends('layouts.backend')

@section('content')

    <div class="row">
        <div class="col-12">
            <a href="{{ route('admin.brands.edit', ['id' => $brand->id]) }}" class="btn btn-sm btn-warning" data-toggle="tooltip" title="{{ __('Edit') }}">
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
                        <td>{{ $brand->name }}</td>
                    </tr>
                    <tr>
                        <th>{{ __('Slug') }}</th>
                        <td>{{ $brand->slug }}</td>
                    </tr>
                    <tr>
                        <th>{{ __('Title') }}</th>
                        <td>{{ $brand->title }}</td>
                    </tr>
                    <tr>
                        <th>{{ __('Description') }}</th>
                        <td>{{ $brand->description }}</td>
                    </tr>
                    <tr>
                        <th>{{ __('Keywords') }}</th>
                        <td>{{ $brand->keywords }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

@endsection
