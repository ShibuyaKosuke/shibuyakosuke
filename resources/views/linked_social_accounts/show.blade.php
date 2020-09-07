@extends('layouts.app')

@section('content')
    <div class="container">

        @if (Session::has('success_message'))
            <div class="alert alert-success">
                {{ session('success_message') }}
            </div>
        @endif

        {{ Breadcrumbs::render() }}

        <div class="mb-3">
            {{ Html::linkRoute('linked_social_accounts.edit', __('buttons.edit'), compact('linked_social_account'), ['class' => 'btn btn-outline-primary']) }}
            {{ Form::button(__('buttons.destroy'), ['type' => 'button', 'data-toggle' => 'modal', 'data-target' => '#model-deleting', 'class' => 'btn btn-outline-danger']) }}
        </div>

        <div class="card">
            <div class="card-header">
                {{ __('pages.show', ['table' => __('tables.linked_social_accounts')]) }}
            </div>

            <div class="card-body">
                <dl>
                    <dt >{{ __('columns.users.name') }}</dt>
                    <dd >{{ $linked_social_account->id->name }}</dd>
                    <dt >{{ __('columns.linked_social_accounts.user_id') }}</dt>
                    <dd >{{ $linked_social_account->user_id }}</dd>
                    <dt >{{ __('columns.linked_social_accounts.provider_name') }}</dt>
                    <dd >{{ $linked_social_account->provider_name }}</dd>
                    <dt >{{ __('columns.linked_social_accounts.provider_id') }}</dt>
                    <dd >{{ $linked_social_account->provider_id }}</dd>
                    <dt >{{ __('columns.linked_social_accounts.created_at') }}</dt>
                    <dd >{{ $linked_social_account->created_at }}</dd>
                    <dt >{{ __('columns.linked_social_accounts.updated_at') }}</dt>
                    <dd >{{ $linked_social_account->updated_at }}</dd>
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
