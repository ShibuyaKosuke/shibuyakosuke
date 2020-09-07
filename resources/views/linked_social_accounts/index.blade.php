@extends('layouts.app')

@section('content')
    <div class="container">

        @if (Session::has('success_message'))
            <div class="alert alert-success">
                {{ session('success_message') }}
            </div>
        @endif

        {{ Breadcrumbs::render() }}

        <div class="row mb-3">
            <div class="col">
                <a href="{{ route('linked_social_accounts.create') }}" class="btn btn-outline-primary">
                    <i class="fas fa-plus"></i>
                    {{ __('buttons.create') }}
                </a>
            </div>
            <div class="col text-right dropdown">
                @if(View::exists('linked_social_accounts.filter'))
                    <button type="button" class="btn btn-outline-primary" data-toggle="toggle" data-target="#filter">
                        <i class="fas fa-filter"></i>
                        {{ __('buttons.filter') }}
                    </button>
                @endif
                @if(Route::has('linked_social_accounts.export'))
                    <button type="button"  class="btn btn-outline-primary dropdown-toggle" role="button" id="dropdownMenuLink"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                       <i class="fas fa-download"></i>
                       {{ __('buttons.export') }}
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="{{ route('linked_social_accounts.export', ['fileType' => 'csv']) }}">CSV</a>
                        <a class="dropdown-item" href="{{ route('linked_social_accounts.export', ['fileType' => 'xlsx']) }}">Excel</a>
                        <a class="dropdown-item" href="{{ route('linked_social_accounts.export', ['fileType' => 'pdf']) }}">PDF</a>
                    </div>
                @endif
            </div>
        </div>

        @includeIf('linked_social_accounts.filter')

        @if($linked_social_accounts->isEmpty())
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-exclamation-triangle"></i> Alert!</h5>
                {{ __('messages.nodata') }}
            </div>
        @else
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col">{{ __('pages.index', ['table' => __('tables.linked_social_accounts')]) }}</div>
                        <div class="col text-right">
                            {{ __('pages.list_total', ['total' => $linked_social_accounts->total(), 'start' => $linked_social_accounts->firstItem(), 'end' => $linked_social_accounts->lastItem()]) }}
                        </div>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped mb-0" style="white-space: nowrap;">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th class="sortable @if(request('sort') == 'id')sort-{{ request('order') }}@endif">{{ Html::linkRoute('linked_social_accounts.index', __('columns.users.name'), ['sort' => 'id', 'order' => request('order') === 'asc' ? 'desc' : 'asc']) }}</th>
                                <th class="sortable @if(request('sort') == 'user_id')sort-{{ request('order') }}@endif">{{ Html::linkRoute('linked_social_accounts.index', __('columns.linked_social_accounts.user_id'), ['sort' => 'user_id', 'order' => request('order') === 'asc' ? 'desc' : 'asc']) }}</th>
                                <th class="sortable @if(request('sort') == 'provider_name')sort-{{ request('order') }}@endif">{{ Html::linkRoute('linked_social_accounts.index', __('columns.linked_social_accounts.provider_name'), ['sort' => 'provider_name', 'order' => request('order') === 'asc' ? 'desc' : 'asc']) }}</th>
                                <th class="sortable @if(request('sort') == 'provider_id')sort-{{ request('order') }}@endif">{{ Html::linkRoute('linked_social_accounts.index', __('columns.linked_social_accounts.provider_id'), ['sort' => 'provider_id', 'order' => request('order') === 'asc' ? 'desc' : 'asc']) }}</th>
                                <th class="sortable @if(request('sort') == 'created_at')sort-{{ request('order') }}@endif">{{ Html::linkRoute('linked_social_accounts.index', __('columns.linked_social_accounts.created_at'), ['sort' => 'created_at', 'order' => request('order') === 'asc' ? 'desc' : 'asc']) }}</th>
                                <th class="sortable @if(request('sort') == 'updated_at')sort-{{ request('order') }}@endif">{{ Html::linkRoute('linked_social_accounts.index', __('columns.linked_social_accounts.updated_at'), ['sort' => 'updated_at', 'order' => request('order') === 'asc' ? 'desc' : 'asc']) }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($linked_social_accounts as $linked_social_account)
                                <tr>
                                    <td>{{ Html::linkRoute('linked_social_accounts.show', __('buttons.show'), compact('linked_social_account'), ['class' => 'btn btn-sm btn-outline-primary']) }}</td>
                                    <td>{{ $linked_social_account->id->name }}</td>
                                    <td>{{ $linked_social_account->user_id }}</td>
                                    <td>{{ $linked_social_account->provider_name }}</td>
                                    <td>{{ $linked_social_account->provider_id }}</td>
                                    <td>{{ $linked_social_account->created_at }}</td>
                                    <td>{{ $linked_social_account->updated_at }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer pb-0">
                    <div class="row">
                        <div class="col pl-2">
                            {{ $linked_social_accounts->appends($params)->links() }}
                        </div>
                        <div class="col pr-2 text-right">
                            <div class="btn-group mb-3" role="group" aria-label="Basic example">
                                @foreach(\config('make_crud.perPages') as $limit)
                                    <a href="{{ route('linked_social_accounts.index', ['limit' => $limit]) }}" class="btn border
                                    @if((request('limit') == null && $limit == \config('make_crud.defaultPerPage')) || request('limit') == $limit)
                                        bg-primary text-white
                                    @else
                                        bg-white
                                    @endif">{{ $limit }}</a>
                                @endforeach

                                <span class="form-control-plaintext ml-2">{{ __('pages.record_per_page') }}</span>
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
