@extends('layouts.app')

@section('css')
    <style>
        .flex-row > .card {
            min-width: 280px;
            max-width: 360px;
        }
    </style>
@stop

@section('content')
    <div class="container">
        @foreach ($products as $i => $chunk)
            <div class="row mb-3">
                @foreach ($chunk as $i => $product)
                    <div class="col-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->name }}</h5>
                                <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="card-link">Documentation</a>
                                <a href="{{ $product->repository_url }}" class="card-link">Github</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
@endsection
