@extends('layouts.app')

@section('content')
    <div class="container">

        {{ Breadcrumbs::render() }}

        {{ BootForm::open(['method' => 'put', 'url' => route('users.update', compact('user'))]) }}
        <div class="card">
            <div class="card-header">
                {{ __('pages.edit', ['table' => __('tables.users')]) }}
            </div>
            <div class="card-body">

                {{ BootForm::text('name', ['html' => __('columns.users.name') . '<span class="required text-danger">*</span>'], old('name', $user->name), ['placeholder' => __('columns.users.name')]) }}
                {{ BootForm::text('github_account', __('columns.users.github_account'), old('github_account', $user->github_account), ['placeholder' => __('columns.users.github_account')]) }}
                {{ BootForm::text('email', ['html' => __('columns.users.email') . '<span class="required text-danger">*</span>'], old('email', $user->email), ['placeholder' => __('columns.users.email')]) }}
                {{ BootForm::text('email_verified_at', __('columns.users.email_verified_at'), old('email_verified_at', $user->email_verified_at), ['placeholder' => __('columns.users.email_verified_at')]) }}
                {{ BootForm::text('password', ['html' => __('columns.users.password') . '<span class="required text-danger">*</span>'], old('password', $user->password), ['placeholder' => __('columns.users.password')]) }}
                {{ BootForm::text('remember_token', __('columns.users.remember_token'), old('remember_token', $user->remember_token), ['placeholder' => __('columns.users.remember_token')]) }}

            </div>
            <div class="card-footer pb-0">
                {{ BootForm::submit() }}
            </div>
        </div>
        {{ BootForm::close() }}
    </div>
@endsection
