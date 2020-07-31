<?php

namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use App\Models\User;


class ProductComposer
{
    public function __construct()
    {
    }

    public function compose(View $view)
    {
        $params = App('request')->query();
        $authors = User::all();
        $view->with(compact('params', 'authors'));
    }
}
