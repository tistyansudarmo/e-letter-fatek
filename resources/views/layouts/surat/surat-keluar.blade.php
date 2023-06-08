@extends('layouts.dashboard.main.main')

@section('container')
    <div class="container">
    <table class="table table-hover table-responsive-md">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nomor Surat</th>
      <th scope="col">Perihal</th>
      <th scope="col">File</th>
      <th scope="col">Penerima</th>
      <th scope="col">Status</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($surat as $surats)
    <tr id="surat-{{ $surats->id }}">
        
      <th scope="row">{{ $loop->iteration }}</th>
      <td>{{ $surats->no_surat}}</td>
      <td>{{ $surats->title }}</td>
      <td><a href="/surat/{{ $surats->no_surat }}" target="_blank" class="text-danger">PDF</a></td>
      <td>{{ $surats->name }}</td>
      <td class="status">
        @if($surats->status == 'Sudah Dibaca')
            <span class="badge badge-success">Sudah dibaca</span>
        @else
            <span class="badge badge-warning">Belum dibaca</span>
        @endif
      </td>

      <td>  
        <div class="d-flex justify-content-between">
        <a href="/edit-surat/{{ $surats->no_surat }}/edit" class="badge badge-primary">Edit</a>

        <form action="/surat/{{ $surats->user_id }}/{{ $surats->id }}" method="post"> 
          @csrf
          @method('delete')
        <a href="/surat/{{ $surats->user_id }}/{{ $surats->surat_id }}" class="badge badge-danger border-0" data-toggle="modal" data-target="#exampleModal">Hapus</a>
        {{-- <button type="button" class="badge badge-danger border-0" data-toggle="modal" data-target="#exampleModal" >Hapus</button> --}}

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus Surat {{ $surats->no_surat }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                Apakah anda yakin menghapus surat?
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
          @endforeach
    </tr>
    {{-- <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Modal Template</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <p>Modal body text goes here.</p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-primary">Save changes</button>
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                  </div> --}}
  </tbody>
</table>
</div>

@endsection