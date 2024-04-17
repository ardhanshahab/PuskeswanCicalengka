@extends('layout.app')

@section('content')
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="page-header">
            <h2 class="pageheader-title">Selamat Datang, {{ auth()->user()->name }}</h2>
            <p>Selamat datang di dashboard Pusat Kesehatan Hewan Cicalengka, Berikut beberapa data yang baru-baru ini diinputkan</p>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Data Pembaruan Input Pasien</h5>
                <p>Data pasien yang baru saja ditangani</p>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered first">
                        <thead>
                            <tr>
                                <th>Nama Hewan</th>
                                <th>Umur</th>
                                <th>Gender</th>
                                <th>Pemilik</th>
                                <th>No Telp</th>
                                <th>Tgl Perawatan</th>
                                <th>Keluhan</th>
                                <th>Tindakan</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Data Pembaruan Tenaga Medis Terbaru</h5>
                <p>Data ini merupakan data tenaga medis yang baru-baru ini ditambahkan</p>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered second" style="width:100%">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nama</th>
                                <th>Umur</th>
                                <th>Email</th>
                                <th>No Hp</th>
                                <th>JK</th>
                            </tr>
                        </thead>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
