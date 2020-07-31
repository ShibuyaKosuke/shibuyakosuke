<?php

namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;

class UserComposer
{
    public function __construct()
    {
    }

    public function compose(View $view)
    {
        $params = App('request')->query();
        $view->with(compact('params'));
    }
}
