@extends('layouts.backend')

@section('content')

    <div class="row">
        <div class="col-12">
            <a href="{{ route('admin.tags.edit', ['id' => $tag->id]) }}" class="btn btn-sm btn-warning" data-toggle="tooltip" title="{{ __('Edit') }}">
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
                        <td>{{ $tag->name }}</td>
                    </tr>
                    <tr>
                        <th>{{ __('Slug') }}</th>
                        <td>{{ $tag->slug }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

@endsection
