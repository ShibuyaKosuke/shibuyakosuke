<div id="filter" style="display: none;">
    <form class="jumbotron border p-3 mb-3">
        <div class="row">
            <div class="col">
                <h5>Filter by</h5>

                {{ BootForm::text('user_id', __('columns.linked_social_accounts.user_id'), $params['user_id'] ?? '', ['placeholder' => __('columns.linked_social_accounts.user_id')]) }}
                {{ BootForm::text('provider_name', __('columns.linked_social_accounts.provider_name'), $params['provider_name'] ?? '', ['placeholder' => __('columns.linked_social_accounts.provider_name')]) }}
                {{ BootForm::text('provider_id', __('columns.linked_social_accounts.provider_id'), $params['provider_id'] ?? '', ['placeholder' => __('columns.linked_social_accounts.provider_id')]) }}
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
