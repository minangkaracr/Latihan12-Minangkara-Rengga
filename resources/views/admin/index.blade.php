@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-6 col-sm-6 mx-auto d-block col-md-2">
                                <img src="{{ URL::to('/') }}/images/dukcapil.jpg" alt="avatar" class="w-100">
                            </div>
                            <div class="col-6 col-sm-6 mx-auto d-block align-content-center col-md-10">
                                @auth
                                    <h2>Hallo {{ auth()->user()->name }}</h2>    
                                    {{-- <p>Ini adalah pengguna device {{ $kategori['namaKategori'] }}. Dengan tipe devicenya {{ $kategori['uniqueID'] }}</p>     --}}
                                    {{-- <p>Ini adalah pengguna device {{ $product['namaProduct'] }}. Dengan tipe devicenya {{ $product['uniqueID'] }}</p> --}}
                                @endauth
                            </div>
                        </div>
                    </div>
                    {{-- <div class="container" style="padding-bottom: 20px; margin-top: 10px; max-height:400px; overflow-y:auto;">
                        @foreach ($history_chat as $item)
                        <div class="mb-3">
                            <div class="card text-white bg-primary mb-3 ms-auto" style="max-width: 80%; background-color:#0176ff !important;">
                                <div class="card-body"><b>
                                        {{ $item->send_chat }}
                                    </b>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="card bg-dark mb-3" style="max-width: 80%; background-color:#cae5f8 !important;">
                                <div class="card-body">
                                    <p class="card-text">
                                            {!! Str::markdown($item->get_chat) !!}
                                    </p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div> --}}
                    <div class="container" style="padding-bottom: 20px; margin-top: 10px">
                        @foreach ($kategori as $kat)
                            <div class="kategori-section">
                                <h2>{{ $kat['name'] }}</h2>
                                <table border="1">
                                    <thead>
                                        <tr>
                                            <th>ID Produk</th>
                                            <th>Nama Produk</th>
                                            <th>Harga</th>
                                            <th>Harga Setelah Diskon</th>
                                            <th>Periode Diskon</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($product as $prod)
                                            @if ($prod['cat_id'] == $kat['id'])
                                                <tr>
                                                    <td>{{ $prod['id'] }}</td>
                                                    <td>{{ $prod['name'] }}</td>
                                                    <td>
                                                        @if (!is_null($prod['discount']))
                                                            <span style="text-decoration: line-through;">
                                                                {{ number_format($prod['price'], 0, ',', '.') }}
                                                            </span>
                                                        @else
                                                            {{ number_format($prod['price'], 0, ',', '.') }}
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if (!is_null($prod['discount']))
                                                            {{ number_format($prod['discounted_price'], 0, ',', '.') }}
                                                        @else
                                                            -
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if (!is_null($prod['discount_period']))
                                                            {{ $prod['discount_period'] }}
                                                        @else
                                                            Tidak ada diskon
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection