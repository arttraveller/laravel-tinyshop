@extends('layouts.backend')

@section('content')

    <div class="row">
        <div class="col-12">
            <a href="{{ route('admin.categories.edit', ['id' => $category->id]) }}" class="btn btn-sm btn-warning" data-toggle="tooltip" title="{{ __('Edit') }}">
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
                        <th>{{ __('Parent category') }}</th>
                        <td>
                            @if (is_null($category->parent))
                                &mdash;
                            @else
                                <a href="{{ route('admin.categories.show', ['id' => $category->parent->id]) }}">
                                    {{ $category->parent->name }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>{{ __('Name') }}</th>
                        <td>{{ $category->name }}</td>
                    </tr>
                    <tr>
                        <th>{{ __('Slug') }}</th>
                        <td>{{ $category->slug }}</td>
                    </tr>
                    <tr>
                        <th>{{ __('Description') }}</th>
                        <td>{{ $category->description }}</td>
                    </tr>

                    <tr>
                        <th>{{ __('Meta title') }}</th>
                        <td>{{ $category->meta_title }}</td>
                    </tr>

                    <tr>
                        <th>{{ __('Meta description') }}</th>
                        <td>{{ $category->meta_description }}</td>
                    </tr>
                    <tr>
                        <th>{{ __('Meta keywords') }}</th>
                        <td>{{ $category->meta_keywords }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

@endsection
