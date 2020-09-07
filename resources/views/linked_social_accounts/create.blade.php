@extends('layouts.app')

@section('content')
    <div class="container">

        {{ Breadcrumbs::render() }}

        {{ BootForm::open(['url' => route('linked_social_accounts.store')]) }}
        <div class="card">
            <div class="card-header">
                {{ __('pages.create', ['table' => __('tables.linked_social_accounts')]) }}
            </div>
            <div class="card-body">

                {{ BootForm::text('user_id', ['html' => __('columns.linked_social_accounts.user_id') . '<span class="required text-danger">*</span>'], old('user_id'), ['placeholder' => __('columns.linked_social_accounts.user_id')]) }}
                {{ BootForm::text('provider_name', __('columns.linked_social_accounts.provider_name'), old('provider_name'), ['placeholder' => __('columns.linked_social_accounts.provider_name')]) }}
                {{ BootForm::text('provider_id', __('columns.linked_social_accounts.provider_id'), old('provider_id'), ['placeholder' => __('columns.linked_social_accounts.provider_id')]) }}

            </div>
            <div class="card-footer pb-0">
                {{ BootForm::submit() }}
            </div>
        </div>
        {{ BootForm::close() }}
    </div>
@endsection
