<?php

// Main
use App\Models\Brand;
use App\Models\Category;
use App\Models\Characteristic;
use App\Models\Product;
use App\Models\Tag;


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


// Categories
Breadcrumbs::for('admin.categories.index', function ($trail) {
    $trail->parent('admin.cp_main');
    $trail->push(__('Categories'), route('admin.categories.index'));
});

Breadcrumbs::for('admin.categories.show', function ($trail, Category $category) {
    $trail->parent('admin.categories.index');
    $trail->push($category->name, route('admin.categories.show', $category));
});

Breadcrumbs::for('admin.categories.create', function ($trail) {
    $trail->parent('admin.categories.index');
    $trail->push(__('Create'), route('admin.categories.create'));
});

Breadcrumbs::for('admin.categories.edit', function ($trail, Category $category) {
    $trail->parent('admin.categories.index');
    $trail->push(__('Edit'), route('admin.categories.edit', $category));
});


// Characteristics
Breadcrumbs::for('admin.characteristics.index', function ($trail) {
    $trail->parent('admin.cp_main');
    $trail->push(__('Characteristics'), route('admin.characteristics.index'));
});

Breadcrumbs::for('admin.characteristics.show', function ($trail, Characteristic $char) {
    $trail->parent('admin.characteristics.index');
    $trail->push($char->name, route('admin.characteristics.show', $char));
});

Breadcrumbs::for('admin.characteristics.create', function ($trail) {
    $trail->parent('admin.characteristics.index');
    $trail->push(__('Create'), route('admin.characteristics.create'));
});

Breadcrumbs::for('admin.characteristics.edit', function ($trail, Characteristic $char) {
    $trail->parent('admin.characteristics.index');
    $trail->push(__('Edit'), route('admin.characteristics.edit', $char));
});


// Products
Breadcrumbs::for('admin.products.index', function ($trail) {
    $trail->parent('admin.cp_main');
    $trail->push(__('Products'), route('admin.products.index'));
});

Breadcrumbs::for('admin.products.create', function ($trail) {
    $trail->parent('admin.products.index');
    $trail->push(__('Create'), route('admin.products.create'));
});

Breadcrumbs::for('admin.products.edit', function ($trail, Product $product) {
    $trail->parent('admin.products.index');
    $trail->push(__('Edit'), route('admin.products.edit', $product));
});
