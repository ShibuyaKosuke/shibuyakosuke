<?php

return [
    \App\Http\ViewComposers\ProductComposer::class => ['products.index', 'products.create', 'products.edit'],
    \App\Http\ViewComposers\UserComposer::class => ['users.index', 'users.create', 'users.edit'],
];
