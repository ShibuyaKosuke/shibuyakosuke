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
                <a href="{{ route('products.create') }}" class="btn btn-outline-primary">
                    <i class="fas fa-plus"></i>
                    {{ __('buttons.create') }}
                </a>
            </div>
            <div class="col text-right dropdown">
                @if(View::exists('products.filter'))
                    <button type="button" class="btn btn-outline-primary" data-toggle="toggle" data-target="#filter">
                        <i class="fas fa-filter"></i>
                        {{ __('buttons.filter') }}
                    </button>
                @endif
                @if(Route::has('products.export'))
                    <button type="button"  class="btn btn-outline-primary dropdown-toggle" role="button" id="dropdownMenuLink"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                       <i class="fas fa-download"></i>
                       {{ __('buttons.export') }}
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="{{ route('products.export', ['fileType' => 'csv']) }}">CSV</a>
                        <a class="dropdown-item" href="{{ route('products.export', ['fileType' => 'xlsx']) }}">Excel</a>
                        <a class="dropdown-item" href="{{ route('products.export', ['fileType' => 'pdf']) }}">PDF</a>
                    </div>
                @endif
            </div>
        </div>

        @includeIf('products.filter')

        @if($products->isEmpty())
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-exclamation-triangle"></i> Alert!</h5>
                {{ __('messages.nodata') }}
            </div>
        @else
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col">{{ __('pages.index', ['table' => __('tables.products')]) }}</div>
                        <div class="col text-right">
                            {{ __('pages.list_total', ['total' => $products->total(), 'start' => $products->firstItem(), 'end' => $products->lastItem()]) }}
                        </div>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped mb-0" style="white-space: nowrap;">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th class="sortable @if(request('sort') == 'id')sort-{{ request('order') }}@endif">{{ Html::linkRoute('products.index', __('columns.products.id'), ['sort' => 'id', 'order' => request('order') === 'asc' ? 'desc' : 'asc']) }}</th>
                                <th class="sortable @if(request('sort') == 'author_id')sort-{{ request('order') }}@endif">{{ Html::linkRoute('products.index', __('columns.users.name'), ['sort' => 'author_id', 'order' => request('order') === 'asc' ? 'desc' : 'asc']) }}</th>
                                <th class="sortable @if(request('sort') == 'name')sort-{{ request('order') }}@endif">{{ Html::linkRoute('products.index', __('columns.products.name'), ['sort' => 'name', 'order' => request('order') === 'asc' ? 'desc' : 'asc']) }}</th>
                                <th class="sortable @if(request('sort') == 'repository_url')sort-{{ request('order') }}@endif">{{ Html::linkRoute('products.index', __('columns.products.repository_url'), ['sort' => 'repository_url', 'order' => request('order') === 'asc' ? 'desc' : 'asc']) }}</th>
                                <th class="sortable @if(request('sort') == 'created_at')sort-{{ request('order') }}@endif">{{ Html::linkRoute('products.index', __('columns.products.created_at'), ['sort' => 'created_at', 'order' => request('order') === 'asc' ? 'desc' : 'asc']) }}</th>
                                <th class="sortable @if(request('sort') == 'updated_at')sort-{{ request('order') }}@endif">{{ Html::linkRoute('products.index', __('columns.products.updated_at'), ['sort' => 'updated_at', 'order' => request('order') === 'asc' ? 'desc' : 'asc']) }}</th>
                                <th class="sortable @if(request('sort') == 'deleted_at')sort-{{ request('order') }}@endif">{{ Html::linkRoute('products.index', __('columns.products.deleted_at'), ['sort' => 'deleted_at', 'order' => request('order') === 'asc' ? 'desc' : 'asc']) }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td>{{ Html::linkRoute('products.show', __('buttons.show'), compact('product'), ['class' => 'btn btn-sm btn-outline-primary']) }}</td>
                                    <td>{{ $product->id }}</td>
                                    <td>{{ $product->author->name }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->repository_url }}</td>
                                    <td>{{ $product->created_at }}</td>
                                    <td>{{ $product->updated_at }}</td>
                                    <td>{{ $product->deleted_at }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer pb-0">
                    <div class="row">
                        <div class="col pl-2">
                            {{ $products->appends($params)->links() }}
                        </div>
                        <div class="col pr-2 text-right">
                            <div class="btn-group mb-3" role="group" aria-label="Basic example">
                                @foreach(\config('make_crud.perPages') as $limit)
                                    <a href="{{ route('products.index', ['limit' => $limit]) }}" class="btn border
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
