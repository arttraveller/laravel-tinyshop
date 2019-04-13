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
    <li class="nav-item">
        <a class="nav-link{{ Request::is( 'admin/categories*') ? ' active' : '' }}" href="{{ route('admin.categories.index') }}">
            {{ __('Categories') }}
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link{{ Request::is( 'admin/characteristics*') ? ' active' : '' }}" href="{{ route('admin.characteristics.index') }}">
            {{ __('Characteristics') }}
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link{{ Request::is( 'admin/products*') ? ' active' : '' }}" href="{{ route('admin.products.index') }}">
            {{ __('Products') }}
        </a>
    </li>
</ul>