<div id="filter" style="display: none;">
    <form class="jumbotron border p-3 mb-3">
        <div class="row">
            <div class="col">
                <h5>Filter by</h5>

                {{ BootForm::select('author_id', __('columns.users.name'), $authors->pluck('name', 'id'), $params['author_id'] ?? '', ['placeholder' => __('columns.users.name')]) }}
                {{ BootForm::text('name', __('columns.products.name'), $params['name'] ?? '', ['placeholder' => __('columns.products.name')]) }}
                {{ BootForm::text('repository_url', __('columns.products.repository_url'), $params['repository_url'] ?? '', ['placeholder' => __('columns.products.repository_url')]) }}
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
