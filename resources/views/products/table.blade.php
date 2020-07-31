<table class="table table-striped" style="white-space: nowrap;">
    <thead>
    <tr>
        <th>{{ __('columns.products.id') }}</th>
        <th>{{ __('columns.users.name') }}</th>
        <th>{{ __('columns.products.name') }}</th>
        <th>{{ __('columns.products.repository_url') }}</th>
        <th>{{ __('columns.products.created_at') }}</th>
        <th>{{ __('columns.products.updated_at') }}</th>
        <th>{{ __('columns.products.deleted_at') }}</th>
    </tr>
    </thead>
    <tbody>
    @foreach($products as $product)
        <tr>
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