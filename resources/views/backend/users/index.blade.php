@extends('layouts.backend')

@section('content')

    @include('backend.partials._nav')

    <table class="table table-bordered table-striped">

        <thead>
            <tr>
                <th>@sortablelink('id',  __('ID'))</th>
                <th>@sortablelink('name',  __('Name'))</th>
                <th>@sortablelink('email',  __('Email'))</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                </tr>
            @endforeach
        </tbody>

    </table>

    {!! $users->appends(Request::except('page'))->render() !!}
@endsection
