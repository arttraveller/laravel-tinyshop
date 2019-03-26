<?php

// Main

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