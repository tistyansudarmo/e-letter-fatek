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
    @foreach ($prodi_ptik as $ptik)
    <tr>
        
      <th scope="row">{{ $loop->iteration }}</th>
      <td>{{ $ptik->no_surat}}</td>
      <td>{{ $ptik->title }}</td>
      <td><a href="/surat/{{ $ptik->no_surat }}" target="_blank" class="text-danger">PDF</a></td>
      <td>{{ $ptik->sender_name }}</td>
      <td>{{ $ptik->recipient_name }}</td>
      <td>{{ $ptik->created_at->diffForHumans() }} ({{ $ptik->created_at }})</td>

    </tr>
    @endforeach
  </tbody>
</table>
</div>
@endsection