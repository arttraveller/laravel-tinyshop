<?php

// Main
use App\Shop\Models\Brand;

Breadcrumbs::for('main', function ($trail) {
    $trail->push(__('Home'), route('main'));
});

Breadcrumbs::for('login', function ($trail) {
    $trail->parent('main');
    $trail->push(__('Login'), route('login'));
});

Breadcrumbs::for('register', function ($trail) {
    $trail->parent('main');
    $trail->push(__('Register'), route('register'));
});

Breadcrumbs::for('password.request', function ($trail) {
    $trail->parent('login');
    $trail->push(__('Reset password'), route('password.request'));
});

Breadcrumbs::for('password.reset', function ($trail, $token) {
    $trail->parent('password.request');
    $trail->push(__('Reset'), route('password.reset', $token));
});



// Users
Breadcrumbs::for('admin.users.index', function ($trail) {
    $trail->parent('main');
    $trail->push(__('Users'), route('admin.users.index'));
});



// Brands
Breadcrumbs::for('admin.brands.index', function ($trail) {
    $trail->parent('main');
    $trail->push(__('Brands'), route('admin.brands.index'));
});

Breadcrumbs::for('admin.brands.show', function ($trail, Brand $brand) {
    $trail->parent('admin.brands.index');
    $trail->push($brand->name, route('admin.brands.show'));
});

Breadcrumbs::for('admin.brands.create', function ($trail) {
    $trail->parent('admin.brands.index');
    $trail->push(__('Create'), route('admin.brands.create'));
});

Breadcrumbs::for('admin.brands.edit', function ($trail, Brand $brand) {
    $trail->parent('admin.brands.index');
    $trail->push(__('Edit'), route('admin.brands.edit', $brand));
});
