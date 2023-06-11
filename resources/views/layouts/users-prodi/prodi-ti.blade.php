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
      @foreach ($users->skip(1) as $user)
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
          <a href="" class="badge badge-primary mr-2">Edit</a>
        <form action="/users-delete/{{ $user->id }}" method="post"> 
          @csrf
          @method('delete')
        <a href="/users-delete/{{ $user->id }}" class="badge badge-danger border-0" data-toggle="modal" data-target="#exampleModal{{ $user->id }}">Hapus</a>
        {{-- <button type="button" class="badge badge-danger border-0" data-toggle="modal" data-target="#exampleModal" >Hapus</button> --}}

        <div class="modal fade" id="exampleModal{{ $user->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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