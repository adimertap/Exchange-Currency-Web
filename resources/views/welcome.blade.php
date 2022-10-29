@extends('layout')

@section('content')
<div class="col-12">
  <div class="card bg-black text-white">
    <div class="card-header position-relative">
      <div class="position-relative z-index-2">
        <div class="row">
          <div class="col-3 text-center">
            <img src="/img/logo.png" alt="120" height="120">
          </div>
          <div class="col-6 text-center mt-3 mb-1">
            <div class="text-center">
              <h1 class="text-primary mb-3 fw-bolder bg-soft-success">AUTHORIZED MONEY CHANGER</h1>
              <h3 class="mb-1 text-white fw-semi-bold">NORTH PADMA STREET <br> LICENSE NO. 23/79/KEP.GBI/Dpr/2021 <br> <b
                  class="text-primary mt-1">PHONE</b> +62851 7325 4848</h3>
            </div>
          </div>
          <div class="col-3 text-center">
            <img src="/img/bm.png" alt="120" height="120">
          </div>
        </div>
        <div class="row">
          <div class="col-3 text-center">
            <h3 class="mb-1 text-white fw-semi-bold">{{ $today }}, {{ $tanggal }}</h3>
          </div>
          <div class="col-6 text-center">
            <h3 class="mb-1 text-white fw-semi-bold">Riasta Valasindo</h3>
          </div>
          <div class="col-3 text-center">
            <h3 class="mb-1 text-white fw-semi-bold"><span id="clock"> 12:16 PM</span></h3>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row mt-1 g-3" style="margin-left: 20px">
    {{-- LEMBAR --}}
    <div class="col-8">
      <div class="row mt-2 mb-3 border border-1 border-300 rounded-2" style="flex-direction: column; max-height:700px">
        @forelse ($kurs as $item)
        <div class="col-6 mb-3">
          <div class="row flex-between-center">
            <div class="col-2" style="margin-left: 40px">
              <img src="{{ $item->img_flag }}" alt="flag" height="80" width="80" />
            </div>
            <div class="card col-4 bg-primary">
              <div class="card-body" style="padding: 0.6rem 0.6rem">
                <h1 class="mb-md-0 fw-bolder text-white text-center">{{ $item->nama_currency }}</h1>
                @if($item->keterangan == '' || $item->keterangan == '-')

                @else
                <h4 class="m-0 fw-bolder text-center text-white">( {{ $item->keterangan }} )100100</h4>
                @endif
              </div>
            </div>
            <div class="card col-4">
              <div class="card-body" style="padding: 0.5rem 0.5rem">
                <h1 class="mb-md-0 fw-bold">{{ number_format($item->nilai_kurs,0,',','.') }}</h1>

              </div>
            </div>
          </div>
        </div>
        @empty
        <p>Tambah Kurs pada Dashboard Master Data Admin</p>
        @endforelse
      </div>
    </div>

    {{-- COINS --}}
    <div class="col-3 ml-2 mt-4 mb-3 border border-1 border-300 rounded-2" style="margin-left: 50px">
      <h2 class="mb-3 text-white fw-semi-bold text-center bg-black">COINS</h2>
      @forelse ($coins as $item)

      <div class="col-11 mb-3" style="margin-left: 16px">
        <div class="row flex-between-center">
          <div class="col-2">
            <img src="{{ $item->img_flag }}" alt="flag" height="60" width="60" />
          </div>
          <div class="card col-4 bg-primary">
            <div class="card-body" style="padding: 0.5rem 0.5rem">
              <h2 class="mb-md-0 fw-bolder text-white text-center">{{ $item->nama_currency }}</h2>
            </div>
          </div>
          <div class="card col-4">
            <div class="card-body" style="padding: 0.5rem 0.5rem">
              <h2 class="mb-md-0 fw-bold">{{ number_format($item->nilai_kurs,0,',','.') }}</h2>
            </div>
          </div>
        </div>


      </div>
      @empty

      @endforelse
    </div>

    <script>
      setInterval(displayclock, 500);

function displayclock() {
    var time = new Date()
    var hrs = time.getHours()
    var min = time.getMinutes()
    var sec = time.getSeconds()
    var en = 'AM';

    if (hrs > 12) {
        en = 'PM'
    }

    if (hrs > 12) {
        hrs = hrs - 12;
    }

    if (hrs == 0) {
        hrs = 12;
    }

    if (hrs < 10) {
        hrs = '0' + hrs;
    }

    if (min < 10) {
        min = '0' + min;
    }

    if (sec < 10) {
        sec = '0' + sec;
    }

    document.getElementById('clock').innerHTML = hrs + ':' + min + ':' + sec + ' ' + en;
  }
    </script>

    @endsection