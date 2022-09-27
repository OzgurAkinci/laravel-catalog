@extends('layouts.app')

@section('title')
    Tüm Ürünler
@endsection

@section('content')
    <div id="app" class="container-fluid">
        <div class="row">
            <div class="col-12 col-md-3 col-lg-2">
                @include('home._product_group_panel')
            </div>
            <div class="col-12 col-md-9 col-lg-10">

                <div class="row">

                    <div class="col-md-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <i class="breadcrumb-item active" aria-current="page">@{{ titleProduct }}</i>
                            </ol>
                        </nav>
                    </div>
                    @foreach ($productGroups as $data)
                        <div class="col-12 col-sm-12 col-md-6 col-lg-4 mb-5 h-100">
                            {{--<h4>@{{ data.model }}</h4>--}}
                            <div class="card shadow p-1" style="border:none">
                                <div>
                                    <img
                                        src="img/{{count($data->products)>0 ? $data->products[0]->photo : 'notfound.jpg'}}"
                                        class="card-img-top" alt=""
                                        style="width: 100%; height: 30vh;">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">{{ $data->title }}</h5>
                                    <p><a href="/products?productGroupId={{$data->id}}" class="btn btn-primary btn-block"><i class="bi bi-eye"></i>
                                            İncele</a></p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    {{--<div class="col-12 col-sm-12 col-md-6 col-lg-4 mb-5 h-100" v-for="(data, key) in productGroups"
                         :key="key">
                        --}}{{--<h4>@{{ data.model }}</h4>--}}{{--
                        <div class="card shadow p-1" style="border:none">
                           --}}{{-- <div v-if="data.photo">
                                <img :src="'img/' + data.photo" class="card-img-top" alt=""
                                     style="width: 100%; height: 30vh;">
                            </div>--}}{{--
                            <div class="card-body">
                                <h5 class="card-title">@{{ data.title }}</h5>
                               --}}{{-- <p class="card-text">Fiyat: <strong> @{{ data.price }} &#8378;</strong></p>
                                <p><a href="#" class="btn btn-primary btn-block"><i class="bi bi-cart-plus-fill"></i>
                                        Sipariş Ver</a></p>--}}{{--
                            </div>
                        </div>
                    </div>--}}

                </div>

            </div>
        </div>
    </div>
@endsection

@section('footer-scripts')
    <script>
        let products = {!! $products !!}
            const
        app = new Vue({
            el: '#app',
            data: {
                titleProduct: 'ProductGroup : All Products',
                products: products
            }
        });
    </script>
@endsection


