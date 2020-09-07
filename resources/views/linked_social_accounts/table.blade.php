<table class="table table-striped" style="white-space: nowrap;">
    <thead>
    <tr>
        <th>{{ __('columns.users.name') }}</th>
        <th>{{ __('columns.linked_social_accounts.user_id') }}</th>
        <th>{{ __('columns.linked_social_accounts.provider_name') }}</th>
        <th>{{ __('columns.linked_social_accounts.provider_id') }}</th>
        <th>{{ __('columns.linked_social_accounts.created_at') }}</th>
        <th>{{ __('columns.linked_social_accounts.updated_at') }}</th>
    </tr>
    </thead>
    <tbody>
    @foreach($linked_social_accounts as $linked_social_account)
        <tr>
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