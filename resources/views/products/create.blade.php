@extends('layouts.app')

@section('content')
    <div class="container">

        {{ Breadcrumbs::render() }}

        {{ BootForm::open(['url' => route('products.store')]) }}
        <div class="card">
            <div class="card-header">
                {{ __('pages.create', ['table' => __('tables.products')]) }}
            </div>
            <div class="card-body">

                {{ BootForm::select('author_id', ['html' => __('columns.users.name') . '<span class="required text-danger">*</span>'], $authors->pluck('name', 'id'), old('author_id'), ['placeholder' => __('columns.users.name')]) }}
                {{ BootForm::text('name', ['html' => __('columns.products.name') . '<span class="required text-danger">*</span>'], old('name'), ['placeholder' => __('columns.products.name')]) }}
                {{ BootForm::text('repository_url', ['html' => __('columns.products.repository_url') . '<span class="required text-danger">*</span>'], old('repository_url'), ['placeholder' => __('columns.products.repository_url')]) }}

            </div>
            <div class="card-footer pb-0">
                {{ BootForm::submit() }}
            </div>
        </div>
        {{ BootForm::close() }}
    </div>
@endsection
