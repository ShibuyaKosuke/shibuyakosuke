<?php

namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class UserComposer
{
    /**
     * Request
     */
    private $request;

    /**
     * UserComposer constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function compose(View $view)
    {
        $params = $this->request->query();
        $view->with(compact('params'));
    }
}
