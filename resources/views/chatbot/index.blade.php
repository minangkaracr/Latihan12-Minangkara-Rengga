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
                                <img src="{{ URL::to('/') }}/images/bot.jpg" alt="avatar" class="w-100">
                            </div>
                            <div class="col-6 col-sm-6 mx-auto d-block align-content-center col-md-10">
                                <h2>Welcome to <strong>Robuddy</strong></h2>
                            </div>
                        </div>
                    </div>
                    <div class="container" style="padding-bottom: 20px; margin-top: 10px; max-height:400px; overflow-y:auto;">
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
                    </div>
                    {{-- <div class="container" style="padding-bottom: 20px; margin-top: 10px">
                        <div class="mb-3">
                            @if (session('response'))
                            <div class="card text-white bg-primary mb-3 ms-auto" style="max-width: 80%;">
                                <div class="card-body"><b>
                                        {{session('inputan')}}
                                    </b>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="card bg-dark mb-3" style="max-width: 80%; background-color:#cae5f8 !important;">
                                <div class="card-body">
                                    <p class="card-text">
                                            {!! Str::markdown(session('response')) !!}
                                    </p>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div> --}}
                    <div class="container" style="padding-bottom: 20px; margin-top: 10px">
                        <form action="{{ route('chatbot.store') }}" method="POST">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="question" id="question"><b>Hallo</b></label>
                                <input type="text" class="form-control" id="question" name="question" placeholder="Apa yang ingin ada tanyakan hari ini?">
                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary col-12" id="submitBtn3" name="tambah" value="create" style="#0085ff !important;">Tanyakan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection