<?php

namespace App\Scopes;

use App\Models\User;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Support\Facades\Auth;

class LinkedSocialAccountScope implements Scope
{
    /**
     * @var User|Authenticatable|null
     */
    private $auth;

    public function __construct()
    {
        $this->auth = Auth::user();
    }

    /**
     * Scope: apply to Eloquent builder.
     *
     * @param Builder $builder
     * @param Model $model
     * @return void
     */
    public function apply(Builder $builder, Model $model)
    {
        //
    }
}
