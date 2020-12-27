
          <div class="row">
            @foreach ($portfolios as $portfolio)
            <div class="card mt-md-3 mx-auto mt-2 pb5" style="width: 23rem;" data-toggle="modal"
              data-target="#{{$portfolio->nama}}">
              <div class="card-body card-body-0">
                <img class="card-img-top" src="{{ asset('img/thumbnail/'.$portfolio->thumbnail) }}" alt="Web App" />
                <div class="text-dark text-center mt-2 pb5">
                  <b>{{$portfolio->nama}}</b> <br />
                  <span>({{$portfolio->keterangan}})</span>
                </div>
              </div>
            </div>
            @endforeach
            {{-- <div class="card  mt-md-3 mx-auto mt-2 pb5" style="width: 23rem;" data-toggle="modal"
              data-target="#modal-viewer">
              <div class="card-body card-body-0">
                <img class="card-img-top" src="{{ asset('assets/img/viewer-dashboard.png') }}" alt="Viewer claim elektronik" />
                <div class="text-dark text-center mt-2 pb5">
                  <b>Viewer Claim Elektronik</b> <br />
                  <span>(Web Admin)</span>
                </div>
              </div>
            </div>
            <div class="card  mt-md-3 mx-auto mt-2 pb5" style="width: 23rem;" data-toggle="modal"
              data-target="#modal-eonesia">
              <div class="card-body card-body-0">
                <img class="card-img-top" src="{{ asset('assets/img/eonesia-pages.png') }}" alt="Website" />
                <div class="text-dark text-center mt-2 pb5">
                  <b>Eonesia Company</b> <br />
                  <span>(Website)</span>
                </div>
              </div>
            </div>
            <div class="card  mt-md-3 mx-auto mt-2 pb5" style="width: 23rem;" data-toggle="modal"
              data-target="#modal-antrian">
              <div class="card-body card-body-0">
                <img class="card-img-top" src="{{ asset('assets/img/antrian-front.png') }}" alt="Antrian App" />
                <div class="text-dark text-center mt-2 pb5">
                  <b>Aplikasi Antrian</b> <br />
                  <span>(Web App)</span>
                </div>
              </div>
            </div>
            <div class="card  mt-md-3 mx-auto mt-2 pb5" style="width: 23rem;" data-toggle="modal"
              data-target="#modal-frame">
              <div class="card-body card-body-0">
                <img class="card-img-top" src="{{ asset('assets/img/frame-digital.png') }}" alt="Frame App" />
                <div class="text-dark text-center mt-2 pb5">
                  <b>Digital Frame</b> <br />
                  <span>(Web App)</span>
                </div>
              </div>
            </div>
            <div class="card  mt-md-3 mx-auto mt-2 pb5" style="width: 23rem;" data-toggle="modal"
              data-target="#modal-event">
              <div class="card-body card-body-0">
                <img class="card-img-top" src="{{ asset('assets/img/eonesia-event.png') }}" alt="Event Yamaha Surakarta"/>
                <div class="text-dark text-center mt-2 pb5">
                  <b>Event Yamaha Surakarta</b> <br />
                  <span>(Web Admin)</span>
                </div>
              </div>
            </div> --}}
          </div>
