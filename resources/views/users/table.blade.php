<table class="table table-striped" style="white-space: nowrap;">
    <thead>
    <tr>
        <th>{{ __('columns.users.id') }}</th>
        <th>{{ __('columns.users.name') }}</th>
        <th>{{ __('columns.users.github_account') }}</th>
        <th>{{ __('columns.users.email') }}</th>
        <th>{{ __('columns.users.email_verified_at') }}</th>
        <th>{{ __('columns.users.password') }}</th>
        <th>{{ __('columns.users.remember_token') }}</th>
        <th>{{ __('columns.users.created_at') }}</th>
        <th>{{ __('columns.users.updated_at') }}</th>
        <th>{{ __('columns.users.deleted_at') }}</th>
    </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
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