@extends('layouts.app')

@section('content')
    <div class="container-fluid">

        {{ Breadcrumbs::render() }}
        
        {{ BootForm::open(['url' => route('users.store')]) }}
        <div class="card">
            <div class="card-header">
                {{ __('pages.create', ['table' => __('tables.users')]) }}
            </div>
            <div class="card-body">

                {{ BootForm::text('name', __('columns.users.name'), old('name'), ['placeholder' => __('columns.users.name')]) }}
                {{ BootForm::text('github_account', __('columns.users.github_account'), old('github_account'), ['placeholder' => __('columns.users.github_account')]) }}
                {{ BootForm::text('email', __('columns.users.email'), old('email'), ['placeholder' => __('columns.users.email')]) }}
                {{ BootForm::text('email_verified_at', __('columns.users.email_verified_at'), old('email_verified_at'), ['placeholder' => __('columns.users.email_verified_at')]) }}
                {{ BootForm::text('password', __('columns.users.password'), old('password'), ['placeholder' => __('columns.users.password')]) }}
                {{ BootForm::text('remember_token', __('columns.users.remember_token'), old('remember_token'), ['placeholder' => __('columns.users.remember_token')]) }}

            </div>
            <div class="card-footer pb-0">
                {{ BootForm::submit() }}
            </div>
        </div>
        {{ BootForm::close() }}
    </div>
@endsection
