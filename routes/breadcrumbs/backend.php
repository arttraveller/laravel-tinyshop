<?php

// Main
use App\Shop\Models\Brand;
use App\Shop\Models\Tag;


Breadcrumbs::for('admin.cp_main', function ($trail) {
    $trail->push(__('Admin'), route('admin.cp_main'));
});


// Users
Breadcrumbs::for('admin.users.index', function ($trail) {
    $trail->parent('admin.cp_main');
    $trail->push(__('Users'), route('admin.users.index'));
});


// Brands
Breadcrumbs::for('admin.brands.index', function ($trail) {
    $trail->parent('admin.cp_main');
    $trail->push(__('Brands'), route('admin.brands.index'));
});

Breadcrumbs::for('admin.brands.show', function ($trail, Brand $brand) {
    $trail->parent('admin.brands.index');
    $trail->push($brand->name, route('admin.brands.show', $brand));
});

Breadcrumbs::for('admin.brands.create', function ($trail) {
    $trail->parent('admin.brands.index');
    $trail->push(__('Create'), route('admin.brands.create'));
});

Breadcrumbs::for('admin.brands.edit', function ($trail, Brand $brand) {
    $trail->parent('admin.brands.index');
    $trail->push(__('Edit'), route('admin.brands.edit', $brand));
});


// Tags
Breadcrumbs::for('admin.tags.index', function ($trail) {
    $trail->parent('admin.cp_main');
    $trail->push(__('Tags'), route('admin.tags.index'));
});

Breadcrumbs::for('admin.tags.show', function ($trail, Tag $tag) {
    $trail->parent('admin.tags.index');
    $trail->push($tag->name, route('admin.tags.show', $tag));
});

Breadcrumbs::for('admin.tags.create', function ($trail) {
    $trail->parent('admin.tags.index');
    $trail->push(__('Create'), route('admin.tags.create'));
});

Breadcrumbs::for('admin.tags.edit', function ($trail, Tag $tag) {
    $trail->parent('admin.tags.index');
    $trail->push(__('Edit'), route('admin.tags.edit', $tag));
});
