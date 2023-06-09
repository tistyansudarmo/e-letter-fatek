@extends('layouts.dashboard.main.main')

@section('container')
    <div class="row">
              <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                <form action="/buat-surat" method="post" class="needs-validation" novalidate="" enctype="multipart/form-data">
                  @csrf
                  <div class="card">
                    <div class="card-header">
                      <h4>Form Surat</h4>
                    </div>
                    <div class="card-body pb-0">
                      <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"/>
                        @error('title')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label>Nomor Surat</label>
                        <input type="text" name="no_surat" class="form-control @error('no_surat') is-invalid @enderror"/>
                        <p class="text-danger" style="font-size: 12px">Contoh : FT - nomor surat</p>
                        @error('no_surat')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label>Logo</label>
                        <input type="file" name="logo_surat" class="form-control @error('logo_surat') is-invalid @enderror"/>
                        @error('logo_surat')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label>Content</label>
                        <textarea class="summernote" name="content_surat"></textarea>
                      </div>
                      <div class="form-group">
                        <label>Tanda Tangan</label>
                        <input type="file" name="ttd_surat" class="form-control @error('ttd_surat') is-invalid @enderror"/>
                        @error('ttd_surat')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                        @enderror
                      </div>
                      <label style="font-weight:600; color: #34395e; font-size: 12px; ">Kirim ke :</label>
                      <div class="form-check form-group">
                        @foreach ($users as $user)
                        @if ($user->name != auth()->user()->name && ($user->name != 'admin' || auth()->user()->name == 'admin') && ($user->prodi_id == auth()->user()->prodi_id))
                        <input class="form-check-input mt-2" type="checkbox" value="{{ $user->id }}" name="penerima[]">
                          <label class="form-check-label d-block p-2" >
                             {{ $user->name }}
                          </label>
                        @endif
                        @endforeach
                      </div>
                    </div>
                    <div class="card-footer pt-0">
                      <button class="btn btn-primary">Simpan</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <script>
              
           </script>
            
@endsection