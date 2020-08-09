<?php

Breadcrumbs::for('home', function ($trail) {
    $trail->add('Home', route('home'));
});
Breadcrumbs::for('welcome', function ($trail) {
    $trail->add('welcome', route('welcome'));
});
Breadcrumbs::for('documentation', function ($trail) {
    $trail->parent('welcome');
    $trail->add('documentation', route('documentation'));
});
Breadcrumbs::for('users.index', function ($trail) {
    $trail->parent('home');
    $trail->add(trans('tables.users'), route('users.index'));
});
Breadcrumbs::for('users.create', function ($trail) {
    $trail->parent('users.index');
    $trail->add('create', route('users.create'));
});
Breadcrumbs::for('users.show', function ($trail, $user) {
    $trail->parent('users.index');
    $trail->add($user->name, route('users.show', $user));
});
Breadcrumbs::for('users.edit', function ($trail, $user) {
    $trail->parent('users.show');
    $trail->add('edit', route('users.edit', $user));
});
