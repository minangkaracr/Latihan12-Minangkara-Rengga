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
                            <div class="col-6 col-sm-6 mx-auto d-block align-content-center col-md-6">
                                <h2>Welcome to <strong>Dukcapil</strong></h2>
                            </div>
                            <div class="col-6 col-sm-6 mx-auto d-block align-content-center col-md-4">
                                <a href="biodata/create" type="button" class="btn btn-success">Tambah Biodata</a>
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
                        <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Nama</th>
                                <th scope="col">NIK</th>
                                <th scope="col">Umur</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                            @foreach ($biodata as $item)
                              <tr>
                                <th scope="row">{{ $loop->index+1 }}</th>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->nik }}</td>
                                <td>{{ $item->umur }} Tahun</td>
                                <td>{{ $item->alamat }}</td>
                                <td>
                                    <div class="row">
                                        <div class="col-3">
                                            <a href="{{ route('biodata.show', $item->id) }}" type="button" class="btn btn-warning">Edit</a>
                                        </div>
                                        <div class="col-6">
                                            <form action="{{ route('biodata.destroy', $item->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Hapus</button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                              </tr>
                            @endforeach
                            </tbody>
                          </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection