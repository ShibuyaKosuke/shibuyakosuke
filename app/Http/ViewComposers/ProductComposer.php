<?php

namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Models\User;


class ProductComposer
{
    /**
     * Request
     */
    private $request;

    /**
     * ProductComposer constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function compose(View $view)
    {
        $params = $this->request->query();
        $authors = User::all();
        $view->with(compact('params', 'authors'));
    }
}
