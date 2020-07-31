@extends('layouts.app')

@section('content')
    <div class="container-fluid">

        @if (Session::has('success_message'))
            <div class="alert alert-success">
                {{ session('success_message') }}
            </div>
        @endif

        <div class="mb-3">
            {{ Html::linkRoute('users.edit', __('buttons.edit'), compact('user'), ['class' => 'btn btn-outline-primary']) }}
            {{ Form::button(__('buttons.destroy'), ['type' => 'button', 'data-toggle' => 'modal', 'data-target' => '#model-deleting', 'class' => 'btn btn-outline-danger']) }}
        </div>

        <div class="card">
            <div class="card-header">
                {{ __('pages.show', ['table' => __('tables.users')]) }}
            </div>

            <div class="card-body">
                <dl class="dl-horizontal">
                    <dt>{{ __('columns.users.id') }}</dt>
                    <dd>{{ $user->id }}</dd>
                    <dt>{{ __('columns.users.name') }}</dt>
                    <dd>{{ $user->name }}</dd>
                    <dt>{{ __('columns.users.github_account') }}</dt>
                    <dd>{{ $user->github_account }}</dd>
                    <dt>{{ __('columns.users.email') }}</dt>
                    <dd>{{ $user->email }}</dd>
                    <dt>{{ __('columns.users.email_verified_at') }}</dt>
                    <dd>{{ $user->email_verified_at }}</dd>
                    <dt>{{ __('columns.users.password') }}</dt>
                    <dd>{{ $user->password }}</dd>
                    <dt>{{ __('columns.users.remember_token') }}</dt>
                    <dd>{{ $user->remember_token }}</dd>
                    <dt>{{ __('columns.users.created_at') }}</dt>
                    <dd>{{ $user->created_at }}</dd>
                    <dt>{{ __('columns.users.updated_at') }}</dt>
                    <dd>{{ $user->updated_at }}</dd>
                    <dt>{{ __('columns.users.deleted_at') }}</dt>
                    <dd>{{ $user->deleted_at }}</dd>
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
