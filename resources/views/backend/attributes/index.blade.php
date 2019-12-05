@extends('layouts.backend')

@section('content')

    @include('backend.partials._nav')

    <div class="d-flex flex-row mb-2">
        <div class="mr-auto">
            @include('backend.partials._create_button', ['route' => 'admin.attributes.create'])
        </div>
        <div>
            @include('backend.partials._search_form')
        </div>
    </div>

    <table class="table table-bordered table-striped">

        <thead>
            <tr>
                <th>@sortablelink('id',  __('ID'))</th>
                <th>@sortablelink('name',  __('Name'))</th>
                <th>@sortablelink('type',  __('Type'))</th>
                <th>@sortablelink('is_required',  __('Required'))</th>
                <th>{{ __('Actions') }}</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($attributes as $oneAttr)
                <tr>
                    <td>{{ $oneAttr->id }}</td>
                    <td><a href="{{ route('admin.attributes.show', $oneAttr) }}">{{ $oneAttr->name }}</a></td>
                    <td>{{ \App\Enums\EAttributeTypes::getLabel($oneAttr->type) }}</td>
                    <td>{{ \App\Enums\EBool::getLabel($oneAttr->is_required) }}</td>
                    <td class="grid-action-column">
                        @include('backend.partials._actions_column', ['resource' => $oneAttr, 'resourceRouteId' => 'attributes'])
                    </td>
                </tr>
            @endforeach
        </tbody>

    </table>

    {!! $attributes->appends(Request::except('page'))->render() !!}
@endsection
