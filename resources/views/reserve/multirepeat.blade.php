@extends('layouts.master')

@section('title','ReservasiTC | Form Reservasi')

@section('content')
  <div class="container" style="width:80%">
    <h1>Form Reservasi</h1>  
    @include('layouts.status')
    @include('layouts.errors')

    @if ($rooms->count() && $agencies->count() && $routines->count() && $categories->count())
      <div class="row">
        <form class="col s12" method="POST" action="{{url('/reserve/multirepeat')}}" enctype="multipart/form-data">
          {{csrf_field()}}


        <div class="section">
          <h5>Informasi Peminjam</h5>
          <div class="divider"></div>
          <p>Informasi peminjam dibutuhkan dalam memastikan keaslian peminjaman. Nomor Telepon dan Email dipergunakan untuk menghubungi peminjam saat ruangan tidak dapat dipinjam, atau ketika ruangan yang akan digunakan dialihkan untuk kegiatan lainnya. Penanggung Jawab Utama dan Sekunder akan disertakan secara otomatis dalam Surat Ijin Peminjaman.</p>

          @component('reserve.form-user', ['agencies' => $agencies])
            @slot('full_name', old('full_name'))
            @slot('nrp_nip', old('nrp_nip'))
            @slot('phone_number', old('phone_number'))
            @slot('email', old('email'))
            @slot('pic_title_1', old('pic_title_1'))
            @slot('pic_name_1', old('pic_name_1'))
            @slot('pic_title_2', old('pic_title_2'))
            @slot('pic_name_2', old('pic_name_2'))
          @endcomponent
        </div>
        <div class="section">
          <h5>Detail Peminjaman</h5>
          <div class="divider"></div>
          <p>Ruangan yang akan dipinjam memiliki kapasitas dan fasilitas yang berbeda-beda. Teknisi yang bertanggung jawab terhadap ruangan dapat dilihat <a href="{{url('staff')}}">di halaman staff.</a> Untuk melihat ketersediaan ruangan dapat dilihat <a href="{{url('room')}}">di halaman ruangan.</a></p>
          
          @include('reserve.form-mult-room')
          @include('reserve.form-time')
          @include('reserve.form-mult-routine')
        </div>

        <div class="section">
          <h5>Keterangan Kegiatan</h5>
          <div class="divider"></div>
          <p>Keterangan kegiatan diperlukan untuk memastikan keaslian peminjaman. Nama Acara akan ditampilkan di ruangan yang dipinjam, apabila peminjaman disetujui. Poster juga akan ditampilkan di ruangan</p>

          @component('reserve.form-event', ['categories' => $categories])
            @slot('title', old('event_title'))
            @slot('event_description', old('event_description'))
          @endcomponent
        </div>
        </form>
      </div>
    @else
      @include('reserve.else-div')
    @endif
  </div>
@endsection

@section('js')
  @include('reserve.form-js')
@endsection
