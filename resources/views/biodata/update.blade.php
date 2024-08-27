@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-6 col-sm-6 d-block align-content-center col-md-4">
                                <a href="{{ route('biodata.index') }}" type="button" class="btn btn-primary">⬅️Kembali</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 col-sm-6 mx-auto d-block col-md-2">
                                <img src="{{ URL::to('/') }}/images/dukcapil.jpg" alt="avatar" class="w-100">
                            </div>
                            <div class="col-6 col-sm-6 mx-auto d-block align-content-center col-md-10">
                                <h2>Welcome to <strong>Dukcapil</strong></h2>
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
                        <form action="{{ route('biodata.update', $biodata->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group mb-3">
                                <label for="name" id="name"><b>Name</b></label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $biodata->name }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="nik" id="nik"><b>NIK</b></label>
                                <input type="text" class="form-control" id="nik" name="nik" value="{{ $biodata->nik }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="umur" id="umur"><b>Umur</b></label>
                                <input type="text" class="form-control" id="umur" name="umur" value="{{ $biodata->umur }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="alamat" id="alamat"><b>Alamat</b></label>
                                <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $biodata->alamat }}">
                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary col-12" id="submitBtn3" name="tambah" value="create" style="#0085ff !important;">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection