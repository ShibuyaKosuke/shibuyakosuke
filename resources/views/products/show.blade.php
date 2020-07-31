@extends('layouts.app')

@section('content')
    <div class="container-fluid">

        @if (Session::has('success_message'))
            <div class="alert alert-success">
                {{ session('success_message') }}
            </div>
        @endif

        <div class="mb-3">
            {{ Html::linkRoute('products.edit', __('buttons.edit'), compact('product'), ['class' => 'btn btn-outline-primary']) }}
            {{ Form::button(__('buttons.destroy'), ['type' => 'button', 'data-toggle' => 'modal', 'data-target' => '#model-deleting', 'class' => 'btn btn-outline-danger']) }}
        </div>

        <div class="card">
            <div class="card-header">
                {{ __('pages.show', ['table' => __('tables.products')]) }}
            </div>

            <div class="card-body">
                <dl class="dl-horizontal">
                    <dt>{{ __('columns.products.id') }}</dt>
                    <dd>{{ $product->id }}</dd>
                    <dt>{{ __('columns.users.name') }}</dt>
                    <dd>{{ $product->author->name }}</dd>
                    <dt>{{ __('columns.products.name') }}</dt>
                    <dd>{{ $product->name }}</dd>
                    <dt>{{ __('columns.products.repository_url') }}</dt>
                    <dd>{{ $product->repository_url }}</dd>
                    <dt>{{ __('columns.products.created_at') }}</dt>
                    <dd>{{ $product->created_at }}</dd>
                    <dt>{{ __('columns.products.updated_at') }}</dt>
                    <dd>{{ $product->updated_at }}</dd>
                    <dt>{{ __('columns.products.deleted_at') }}</dt>
                    <dd>{{ $product->deleted_at }}</dd>
                </dl>
            </div>

            <!--
            <div class="card-footer">
            </div>
            -->
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="model-deleting" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header model-danger">
                    <h5 class="modal-title">Caution!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{ __('messages.deleting') }}
                </div>
                <div class="modal-footer">
                    {{ Form::open(['method' => 'delete']) }}
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">{{ __('buttons.cancel') }}</button>
                    <button type="submit" class="btn btn-danger">{{ __('buttons.destroy') }}</button>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@endsection
