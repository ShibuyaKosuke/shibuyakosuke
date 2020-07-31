@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        {{ BootForm::open(['url' => route('products.store')]) }}
        <div class="card">
            <div class="card-header">
                {{ __('pages.create', ['table' => __('tables.products')]) }}
            </div>
            <div class="card-body">

                {{ BootForm::select('author_id', __('columns.users.name'), $authors->pluck('name', 'id'), old('author_id'), ['placeholder' => __('columns.users.name')]) }}
                {{ BootForm::text('name', __('columns.products.name'), old('name'), ['placeholder' => __('columns.products.name')]) }}
                {{ BootForm::text('repository_url', __('columns.products.repository_url'), old('repository_url'), ['placeholder' => __('columns.products.repository_url')]) }}

            </div>
            <div class="card-footer pb-0">
                {{ BootForm::submit() }}
            </div>
        </div>
        {{ BootForm::close() }}
    </div>
@endsection
