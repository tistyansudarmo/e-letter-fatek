@extends('layouts.dashboard.main.main')

@section('container')

  <table class="table table-hover table-responsive-md">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama</th>
      <th scope="col">Email</th>
      <th scope="col">NIP</th>
      <th scope="col">Alamat</th>
      <th scope="col">T/T/B Lahir</th>
      <th scope="col">Nomor Handphone</th>
      <th scope="col">Jabatan</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>

    @foreach ($users as $user)
    <tr>  
        <th scope="row">{{ $loop->iteration }}</th>
        <td>{{ $user->name}}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->nip }}</td>
        <td>{{ $user->alamat }}</td>
        <td>{{ $user->ttl }}</td>
        <td>{{ $user->no_hp }}</td>
        <td>{{ $user->jabatan }}</td>
        <td>

        <div class="d-flex justify-content-between">

          <form action="/users-update/{{ $user->id }}" method="post">
            @csrf
            @method('put')
          <a href="/users-update/{{ $user->id }}" class="badge badge-primary mr-2" data-toggle="modal" data-target="#exampleModal{{ $user->id }}">Edit</a>
            <div class="modal fade" id="exampleModal{{ $user->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Edit Data User</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-6">
                    <label for="name">Nama Lengkap</label>
                      <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" autofocus>
                      @error('name')
                      <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                  </div>

                  <div class="col-md-6">
                    <label for="username">Username Login</label>
                      <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ $user->username }}">
                      @error('username')
                      <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                     <label for="email" class="mt-4">Email</label>
                      <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}">
                      @error('email')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror
                  </div>

                  <div class="col-md-6">
                     <label for="password" class="d-block mt-4">Ubah Password</label>
                      <input id="password" type="password" class="form-control pwstrength @error('password') is-invalid @enderror" data-indicator="pwindicator" name="password">
                      @error('password')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                     <label for="tempat" class="mt-4">Tempat Lahir</label>
                      <input id="tempat" type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" value="{{ $user->alamat }}">
                      @error('alamat')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                      @enderror
                  </div>

                  <div class="col-md-6">
                    <label for="date" class="mt-4">Tanggal/Bulan/Tahun</label>
                      <input id="date" type="date" class="form-control @error('ttl') is-invalid @enderror" name="ttl" value="{{ $user->ttl }}">
                      @error('ttl')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                      @enderror
                  </div>
                </div>

                <div class="row">
                  <div class="col md-6">
                    <label for="nip" class="mt-4">Nomor Induk Pegawai</label>
                      <input id="nip" type="text" class="form-control @error('nip') is-invalid @enderror" name="nip" value="{{ $user->nip }}">
                      @error('nip')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                      @enderror
                  </div>

                  <div class="col-md-6">
                     <label for="no_hp" class="mt-4">No Hp</label>
                      <input id="no_hp" type="text" class="form-control @error('no_hp') is-invalid @enderror" name="no_hp" value="{{ $user->no_hp }}">
                      @error('no_hp')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                      @enderror
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <select class="form-control mt-4" aria-label="Default select example" name="prodi_id">
                        <option value="">--Pilih Prodi--</option>
                        @foreach ($prodi as $prodis)
                        <option {{ $user->prodi_id == $prodis->id ? 'selected' : '' }} value="{{ $prodis->id }}">{{ $prodis->prodi }}</option>                    
                        @endforeach
                      </select>
                  </div>

                  <div class="col-md-6">
                    <select class="form-control mt-4" aria-label="Default select example" name="level_id">
                        <option value="">--Pilih Level--</option>
                        @foreach ($level as $levels)
                        <option {{ $user->level_id == $levels->id ? 'selected' : '' }} value="{{ $levels->id}}">{{ $levels->jabatan }}</option>
                        @endforeach
                      </select>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-danger">Simpan</button>
              </div>
            </div>
          </div>
        </div>
          </form>

        <form action="/users-delete/{{ $user->id }}" method="post"> 
          @csrf
          @method('delete')
        <a href="/users-delete/{{ $user->id }}" class="badge badge-danger border-0" data-toggle="modal" data-target="#exampleModal2{{ $user->id }}">Hapus</a>
        {{-- <button type="button" class="badge badge-danger border-0" data-toggle="modal" data-target="#exampleModal" >Hapus</button> --}}

        <div class="modal fade" id="exampleModal2{{ $user->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus user {{ $user->name }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                Apakah anda yakin menghapus user?
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-danger">Hapus</button>
              </div>
            </div>
          </div>
        </div>
     
      </td>
    
    </div>
      </form>
        </td>

  </tr>
    @endforeach
  </tbody>
</table>

@endsection