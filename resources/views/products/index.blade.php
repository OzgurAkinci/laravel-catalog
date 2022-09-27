@extends('layouts.app')

@section('title')
    Tüm Ürünler
@endsection

@section('content')
    <div id="app" class="container-fluid">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">

                <div class="row">

                    <div class="col-md-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <i class="breadcrumb-item active" aria-current="page">TEST</i>
                            </ol>
                        </nav>
                    </div>
                    @foreach ($products as $data)
                        <div class="col-12 col-sm-12 col-md-3 col-lg-3 mb-5 h-100">
                            <h4>{{$data->model}}</h4>
                            <div class="card shadow p-1" style="border:none">
                                <div>
                                    <img
                                        src="img/{{$data->photo}}"
                                        class="card-img-top" alt=""
                                        style="width: 100%; height: 30vh;">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">{{ $data->name }}</h5>
                                    <p>
                                        <a href="/products" class="btn btn-primary btn-block">
                                            <i class="bi bi-cart"></i> Sipariş Ver
                                        </a></p>
                                </div>
                            </div>
                        </div>
                    @endforeach


                </div>

            </div>
        </div>
    </div>
@endsection

