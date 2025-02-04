@extends('layout')

@section('content')

<div class="col-12">
  <div class="card bg-black-tes text-white">
    <div class="card-header position-relative pb-0">
      <div class="position-relative z-index-2">
        <div class="row">
          <div class="col-3 text-center">
            <img src="/img/logo.png" alt="150" height="150">
          </div>
          <div class="col-6 text-center mt-3 mb-1">
            <div class="text-center">
              <h1 class="text-primary mb-1 fw-bolder bg-ijo text-white h11">AUTHORIZED MONEY CHANGER</h1>
              <h2 class="mb-1 text-white fw-semi-bold h44 mt-3">{{ $today }}, {{ $tanggal }} </h2>
                <h2 class="text-primary mt-2" id="clock">12:16 PM</h2>
            </div>
          </div>
          <div class="col-3 text-center">
            <img src="/img/bm.png" alt="150" height="150">
          </div>
        </div>
        {{-- <div class="row">
          <div class="col-3 text-center">
            <h4 class="mb-1 text-white fw-semi-bold h44">{{ $today }}, {{ $tanggal }}</h3>
          </div>
          <div class="col-6 text-center">
            <h4 class="mb-1 text-white fw-semi-bold h44"></h3>
          </div>
          <div class="col-3 text-center">
            <h4 class="mb-1 text-white fw-semi-bold h44"><span id="clock"> 12:16 PM</span></h3>
          </div>
        </div> --}}
      </div>
    </div>
  </div>

  <div class="row mt-2" style="margin-left: 10px; margin-right: 10px">
    <div class="col-12">
      <div class="row mb-3 pt-2 pe-4 border border-1 border-300 rounded-2" style="flex-direction: column; max-height:900px">
        @forelse ($kurs as $item)
        <div class="col-4 mb-4">
          <div class="row flex-between-center">
            <div class="col-1" style="margin-left: 50px">
              <img src="{{ $item->img_flag }}" alt="flag" height="70" width="70" />
            </div>
            <div class="card col-4 bg-kotak">
              <div class="card-body" style="padding: 0.5rem 0.5rem">
                <h1 class="mb-md-0 fw-bolder text-tes text-center h11">{{ $item->nama_currency }}</h1>
                @if($item->keterangan == '' || $item->keterangan == '-')

                @else
                <h4 class="m-0 fw-bolder text-center text-tes h44">( {{ $item->keterangan }} )</h4>
                @endif
              </div>
            </div>
            <div class="card col-4">
              <div class="card-body" style="padding: 0.4rem 0.4rem">
                  @if(fmod($item->nilai_kurs,1) !== 0.00)
                  <h1 class="mb-md-0 fw-bold text-nilai h11">{{ number_format($item->nilai_kurs,2,',','.') }}</h1>
                  @else
                  <h1 class="mb-md-0 fw-bold text-nilai h11">{{ number_format($item->nilai_kurs,0,',','.') }}</h1>

                  @endif
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
    {{-- <div class="col-3 ml-2 mt-3 mb-3 border border-1 border-300 rounded-2" style="margin-left: 50px">
      <h2 class="mb-3 text-white fw-semi-bold text-center bg-black-tes h22">COINS</h2>
      @forelse ($coins as $item)

      <div class="col-11 mb-3" style="margin-left: 16px">
        <div class="row flex-between-center">
          <div class="col-2">
            <img src="{{ $item->img_flag }}" alt="flag" height="60" width="60" />
          </div>
          <div class="card col-4 bg-kotak">
            <div class="card-body" style="padding: 0.5rem 0.5rem">
              <h2 class="mb-md-0 fw-bolder text-tes text-center h22">{{ $item->nama_currency }}</h2>
            </div>
          </div>
          <div class="card col-4">
            <div class="card-body" style="padding: 0.5rem 0.5rem">
              <h2 class="mb-md-0 fw-bold text-nilai h22">{{ number_format($item->nilai_kurs,0,',','.') }}</h2>
            </div>
          </div>
        </div>


      </div>
      @empty

      @endforelse
    </div> --}}

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

  setTimeout(function(){
         window.location.reload(1);
      }, 15000);
    </script>

    @endsection
