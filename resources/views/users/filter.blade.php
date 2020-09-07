<div id="filter" style="display: none;">
    <form class="jumbotron border p-3 mb-3">
        <div class="row">
            <div class="col">
                <h5>Filter by</h5>

                {{ BootForm::text('name', __('columns.users.name'), $params['name'] ?? '', ['placeholder' => __('columns.users.name')]) }}
                {{ BootForm::text('github_account', __('columns.users.github_account'), $params['github_account'] ?? '', ['placeholder' => __('columns.users.github_account')]) }}
                {{ BootForm::text('email', __('columns.users.email'), $params['email'] ?? '', ['placeholder' => __('columns.users.email')]) }}
                {{ BootForm::text('email_verified_at', __('columns.users.email_verified_at'), $params['email_verified_at'] ?? '', ['placeholder' => __('columns.users.email_verified_at')]) }}
                {{ BootForm::text('password', __('columns.users.password'), $params['password'] ?? '', ['placeholder' => __('columns.users.password')]) }}
                {{ BootForm::text('remember_token', __('columns.users.remember_token'), $params['remember_token'] ?? '', ['placeholder' => __('columns.users.remember_token')]) }}
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
