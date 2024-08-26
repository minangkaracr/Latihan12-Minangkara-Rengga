@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="container">
                        <div class="row">
                            <div class="col-6 col-sm-6 mx-auto d-block col-md-2">
                                <img src="{{ URL::to('/') }}/images/avatar-1.jpg" alt="avatar" class="w-100">
                            </div>
                            <div class="col col-sm-8 col-md-4 d-flex align-items-center mb-3">
                                <div class="row">
                                    <h2><b id="myName"><?php if(@$nama){echo $nama;} else {echo "Name";}?></b></h2>
                                    <p id="myRole"><?php if(@$role){echo $role;} else {echo "Role";}?></p>
                                    <div>
                                        <button type="button" class="btn btn-primary">Kontak</button>
                                        <button type="button" class="btn btn-outline-primary">Resume</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3 align-content-center">
                                <?php
                                    $infoLabel = ["Availability", "Age", "Lokasi", "Experience", "Email"];
                                    $infoFields = [@$availability, @$age, @$lokasi, @$pengalaman, @$email];
                                ?>
                                <div>
                                        <?php 
                                            for ($i = 0; $i < count($infoFields); $i++) {
                                        ?>
                                        <div class="row" id="my<?php echo $infoLabel[$i]?>">
                                            <div class="col-sm-4"><b><?php echo $infoLabel[$i]?></b></div>
                                            <div class="col-sm-8"><?php if(!$infoFields[$i]){echo "-";} else {echo $infoFields[$i];}?></div>
                                        </div>
                                        <?php
                                            };
                                        ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container" style="padding-bottom: 20px; margin-top: 10px">
                        <form action="../database/actionForm.php" method="POST">
                            <div class="form-group mb-3">
                                <label for="nama" id="name"><b>Nama</b></label>
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama">
                            </div>
                            <div class="form-group mb-3">
                                <label for="role" ><b>Role</b></label>
                                <input type="text" class="form-control" id="role" name="role" placeholder="Masukkan Role">
                            </div>
                            <div class="form-group mb-3">
                                <label for="availability" ><b>Availability</b></label>
                                <select id="availability" name="availability" class="form-select">
                                    <option value="fulltime">Full Time</option>
                                    <option value="parttime">Part Time</option>
                                    <option value="internship">Internship</option>
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label for="age" ><b>Umur</b></label>
                                <input type="text" class="form-control" id="age" name="age" placeholder="Masukkan Umur">
                            </div>
                            <div class="form-group mb-3">
                                <label for="lokasi" ><b>lokasi</b></label>
                                <input type="text" class="form-control" id="lokasi" name="lokasi" placeholder="Masukkan Lokasi">
                                
                            </div>
                            <div class="form-group mb-3">
                                <label for="pengalaman" ><b>Pengalaman</b></label>
                                <input type="text" class="form-control" id="pengalaman" name="pengalaman" placeholder="Masukkan Tahun Pengalaman">
                                
                            </div>
                            <div class="form-group mb-3">
                                <label for="email" ><b>Email</b></label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan email">
                                <small id="email-error" style="color: red; display: none;">Email tidak valid, mohon masukkan email yang benar</small>                
                            </div>
                            <div>
                                <!-- <button type="submit" class="btn btn-success col-12" id="submitBtn" disabled name="submit_session" value="session">Submit Session</button> -->
                                <!-- <button type="submit" class="btn btn-primary col-12" id="submitBtn2" disabled name="submit_cookie" value="cookie">Submit Cookie</button> -->
                                <button type="submit" class="btn btn-primary col-12" id="submitBtn3" name="tambah" value="create">Tambahkan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection