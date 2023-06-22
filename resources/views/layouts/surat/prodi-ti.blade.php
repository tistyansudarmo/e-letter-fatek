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
      <th scope="col">Pengirim</th>
      <th scope="col">Penerima</th>
      <th scope="col">Dikirim</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($prodi_ti as $informatics)
    <tr>
        
      <th scope="row">{{ $loop->iteration }}</th>
      <td>{{ $informatics->no_surat}}</td>
      <td>{{ $informatics->title }}</td>
      <td><a href="/surat/{{ $informatics->no_surat }}" target="_blank" class="text-danger">PDF</a></td>
      <td>{{ $informatics->sender_name }}</td>
      <td>{{ $informatics->recipient_name }}</td>
      <td>{{ $informatics->created_at->diffForHumans() }} ({{ $informatics->created_at }})</td>

    </tr>
    @endforeach
  </tbody>
</table>
</div>
@endsection