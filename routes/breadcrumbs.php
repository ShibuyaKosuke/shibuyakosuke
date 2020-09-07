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

Breadcrumbs::for('products.index', function ($trail) {
    $trail->parent('home');
    $trail->add(trans('tables.products'), route('products.index'));
});

Breadcrumbs::for('products.create', function ($trail) {
    $trail->parent('products.index');
    $trail->add(trans('pages.create'), route('products.create'));
});

Breadcrumbs::for('products.show', function ($trail, $product) {
    $trail->parent('products.index');
    $trail->add($product->name, route('products.show', $product));
});

Breadcrumbs::for('products.edit', function ($trail, $product) {
    $trail->parent('products.show', $product);
    $trail->add(trans('pages.edit'), route('products.edit', $product));
});

Breadcrumbs::for('linked_social_accounts.index', function ($trail) {
    $trail->parent('home');
    $trail->add(trans('tables.linked_social_accounts'), route('linked_social_accounts.index'));
});

Breadcrumbs::for('linked_social_accounts.create', function ($trail) {
    $trail->parent('linked_social_accounts.index');
    $trail->add(trans('pages.create'), route('linked_social_accounts.create'));
});

Breadcrumbs::for('linked_social_accounts.show', function ($trail, $linked_social_account) {
    $trail->parent('linked_social_accounts.index');
    $trail->add('LinkedSocialAccount' . $linked_social_account->id, route('linked_social_accounts.show', $linked_social_account));
});

Breadcrumbs::for('linked_social_accounts.edit', function ($trail, $linked_social_account) {
    $trail->parent('linked_social_accounts.show', $linked_social_account);
    $trail->add(trans('pages.edit'), route('linked_social_accounts.edit', $linked_social_account));
});
