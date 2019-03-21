@extends('layouts.backend')

@section('content')

    @include('backend.partials._nav')

    <table class="table table-bordered table-striped">

        <thead>
            <tr>
                <th>{{ __('ID') }}</th>
                <th>{{ __('Name') }}</th>
                <th>{{ __('Email') }}</th>
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

    {{ $users->links() }}
@endsection
