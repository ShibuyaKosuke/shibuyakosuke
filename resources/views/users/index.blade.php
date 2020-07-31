@extends('layouts.app')

@section('content')
    <div class="container-fluid">

        @if (Session::has('success_message'))
            <div class="alert alert-success">
                {{ session('success_message') }}
            </div>
        @endif

        <div class="row mb-3">
            <div class="col">
                {{ Html::linkRoute('users.create', __('buttons.create'), null, ['class' => 'btn btn-outline-primary']) }}
            </div>
            <div class="col text-right">
                <button type="button" class="btn btn-outline-secondary" data-toggle="toggle" data-target="#filter">
                    <i class="fas fa-filter"></i>
                    {{ __('buttons.filter') }}
                </button>
            </div>
        </div>

        <div id="filter" style="display: none;">
            <form class="jumbotron border p-3 mb-3">
                <div class="row">
                    <div class="col">
                        <h5>Filter by</h5>
                    </div>
                </div>
                <hr class="my-3">
                <div class="row">
                    <div class="col">
                        <button class="btn btn-outline-primary" type="submit">
                            {{ __('buttons.filter') }}
                        </button>
                    </div>
                    <div class="col text-right">
                        <a class="btn btn-link" role="button">
                            {{ __('buttons.cancel') }}
                        </a>
                    </div>
                </div>
            </form>
        </div>

        @if($users->isEmpty())
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-exclamation-triangle"></i> Alert!</h5>
                {{ __('messages.nodata') }}
            </div>
        @else
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col">{{ __('pages.index', ['table' => __('tables.users')]) }}</div>
                        <div class="col text-right">
                            {{ __('pages.list_total', ['total' => $users->total(), 'start' => $users->firstItem(), 'end' => $users->lastItem()]) }}
                        </div>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped" style="white-space: nowrap;">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ Html::linkRoute('users.index', __('columns.users.id'), ['sort' => 'id', 'order' => request('order') === 'asc' ? 'desc' : 'asc']) }}</th>
                                <th>{{ Html::linkRoute('users.index', __('columns.users.name'), ['sort' => 'name', 'order' => request('order') === 'asc' ? 'desc' : 'asc']) }}</th>
                                <th>{{ Html::linkRoute('users.index', __('columns.users.github_account'), ['sort' => 'github_account', 'order' => request('order') === 'asc' ? 'desc' : 'asc']) }}</th>
                                <th>{{ Html::linkRoute('users.index', __('columns.users.email'), ['sort' => 'email', 'order' => request('order') === 'asc' ? 'desc' : 'asc']) }}</th>
                                <th>{{ Html::linkRoute('users.index', __('columns.users.email_verified_at'), ['sort' => 'email_verified_at', 'order' => request('order') === 'asc' ? 'desc' : 'asc']) }}</th>
                                <th>{{ Html::linkRoute('users.index', __('columns.users.password'), ['sort' => 'password', 'order' => request('order') === 'asc' ? 'desc' : 'asc']) }}</th>
                                <th>{{ Html::linkRoute('users.index', __('columns.users.remember_token'), ['sort' => 'remember_token', 'order' => request('order') === 'asc' ? 'desc' : 'asc']) }}</th>
                                <th>{{ Html::linkRoute('users.index', __('columns.users.created_at'), ['sort' => 'created_at', 'order' => request('order') === 'asc' ? 'desc' : 'asc']) }}</th>
                                <th>{{ Html::linkRoute('users.index', __('columns.users.updated_at'), ['sort' => 'updated_at', 'order' => request('order') === 'asc' ? 'desc' : 'asc']) }}</th>
                                <th>{{ Html::linkRoute('users.index', __('columns.users.deleted_at'), ['sort' => 'deleted_at', 'order' => request('order') === 'asc' ? 'desc' : 'asc']) }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ Html::linkRoute('users.show', __('buttons.show'), compact('user'), ['class' => 'btn btn-sm btn-outline-primary']) }}</td>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->github_account }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->email_verified_at }}</td>
                                    <td>{{ $user->password }}</td>
                                    <td>{{ $user->remember_token }}</td>
                                    <td>{{ $user->created_at }}</td>
                                    <td>{{ $user->updated_at }}</td>
                                    <td>{{ $user->deleted_at }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer pb-0">
                    <div class="row">
                        <div class="col pl-2">
                            {{ $users->appends($params)->links() }}
                        </div>
                        <div class="col pr-2 text-right">
                            <div class="btn-group mb-3" role="group" aria-label="Basic example">
                                @foreach(\config('make_crud.perPages') as $limit)
                                    <a href="{{ route('users.index', ['limit' => $limit]) }}" class="btn border
                                    @if((request('limit') == null && $limit == \config('make_crud.defaultPerPage')) || request('limit') == $limit)
                                        bg-primary text-white
                                    @else
                                        bg-white
                                    @endif">{{ $limit }}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection

@section('js')
    <script>
        $(function () {
            $('[data-toggle="toggle"]').on('click', function () {
                $($(this).data('target')).slideToggle();
            });
        });
    </script>
@endsection
