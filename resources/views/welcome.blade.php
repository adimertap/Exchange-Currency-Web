@extends('layout')

@section('content')

<div class="col-12" id="welcome-ajax-root">
  @include('partials.welcome-refresh')
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

    var el = document.getElementById('clock');
    if (el) {
        el.innerHTML = hrs + ':' + min + ':' + sec + ' ' + en;
    }
  }

  (function () {
    var fragmentUrl = @json(route('welcome.fragment'));
    function refreshWelcomeKurs() {
      fetch(fragmentUrl, {
        headers: {
          'X-Requested-With': 'XMLHttpRequest',
          'Accept': 'text/html'
        },
        credentials: 'same-origin'
      })
        .then(function (response) { return response.text(); })
        .then(function (html) {
          var root = document.getElementById('welcome-ajax-root');
          if (root) {
            root.innerHTML = html;
          }
        })
        .catch(function () {});
    }
    setInterval(refreshWelcomeKurs, 15000);
  })();
    </script>

    @endsection
