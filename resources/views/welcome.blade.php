@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="jumbotron jumbotron-fluid">
                    <div class="container">
                        <h1 class="display-4 text-center">
                            Laravel Crud Command
                        </h1>
                        <p class="lead text-center">
                            Crud generator for Laravel.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-6">
                <pre class="bg-dark text-white p-3">php artisan make:crud users --sortable --with-export --with-filter</pre>
            </div>
            <div class="col-md-6">

            </div>
        </div>

        <div class="row justify-content-center mb-4">
            <div class="col-md-12">
                <div class="card">
                    <h5 class="card-header">Featured</h5>
                    <div class="card-body">
                        <ol>
                            <li>
                                <h5>Generate a file for translation from MySQL table comment and column comment.</h5>
                                <ul>
                                    <li>resourcees/lang/{locale}/tables.php</li>
                                    <li>resourcees/lang/{locale}/columns.php</li>
                                </ul>
                            </li>
                            <li>
                                <h5>Create validation rule from MySQL table definition.</h5>
                                <ul>
                                    <li>rules/{model}.php</li>
                                </ul>
                            </li>
                            <li>
                                <h5>Model creation</h5>
                                <ul>
                                    <li>A property is automatically generated from the table column.</li>
                                    <li>Output belongsTo, hasMany, belongsToMany methods from the foreign key
                                        constraint.
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <h5>Controller creation</h5>
                                <ul>
                                    <li>Output all methods required for CRUD.</li>
                                </ul>
                            </li>
                            <li>
                                <h5>Global scope creation</h5>
                                <ul>
                                    <li>Create one global scope class for each model.</li>
                                </ul>
                            </li>
                            <li>
                                <h5>Form request class creation</h5>
                                <ul>
                                    <li>The rules are automatically output from the table definition.</li>
                                </ul>
                            </li>
                            <li>
                                <h5>View composer creation</h5>
                                <ul>
                                    <li>Automatically generate the logic that passes the form part to the view from the
                                        foreign key definition.
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <h5>View creation</h5>
                                <ul>
                                    <li>Lists, details, new creations and updates are automatically generated.</li>
                                </ul>
                            </li>
                            <li>
                                <h5>Breadcrumb list creation</h5>
                                <ul>
                                    <li>A breadcrumb trail is automatically output to the file generated by CRUD.</li>
                                </ul>
                            </li>
                            <li>
                                <h5>Template customization</h5>
                                <ul>
                                    <li>Depending on the project, you may need to customize
                                        the output template. In that case, you can edit the stub
                                        as you like.
                                    </li>
                                </ul>
                            </li>
                        </ol>

                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center mb-4">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title m-0">Documentation</h4>
                    </div>
                    <div class="card-body">

                    </div>
                    <div class="card-footer text-center">
                        <a href="{{ route('documentation') }}" class="fa fa-chevron-right">
                            read documentation
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title m-0">Tutorial</h4>
                    </div>
                    <div class="card-body">

                    </div>
                    <div class="card-footer text-center">
                        <a href="{{ route('tutorial') }}" class="fa fa-chevron-right">
                            Go tutorial
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title m-0">Forum</h4>
                    </div>
                    <div class="card-body">

                    </div>
                    <div class="card-footer text-center">
                        <a href="" class="fa fa-chevron-right">
                            Go forum
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
    </script>
@endsection
