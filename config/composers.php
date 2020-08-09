<?php

return [
    \App\Http\ViewComposers\ProductComposer::class => ['products.index', 'products.create', 'products.edit'],
    \App\Http\ViewComposers\UserComposer::class => ['users.index', 'users.create', 'users.edit'],
    \App\Http\ViewComposers\LinkedSocialAccountComposer::class => ['linked_social_accounts.index', 'linked_social_accounts.create', 'linked_social_accounts.edit'],
];
