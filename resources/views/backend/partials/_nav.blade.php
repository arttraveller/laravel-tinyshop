<ul class="nav nav-tabs mb-2">
    <li class="nav-item">
        <a class="nav-link{{ Request::is( 'admin') ? ' active' : '' }}" href="{{ route('admin.cp_main') }}">
            {{ __('Dashboard') }}
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link{{ Request::is( 'admin/users*') ? ' active' : '' }}" href="{{ route('admin.users.index') }}">
            {{ __('Users') }}
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link{{ Request::is( 'admin/brands*') ? ' active' : '' }}" href="{{ route('admin.brands.index') }}">
            {{ __('Brands') }}
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link{{ Request::is( 'admin/tags*') ? ' active' : '' }}" href="{{ route('admin.tags.index') }}">
            {{ __('Tags') }}
        </a>
    </li>
</ul>