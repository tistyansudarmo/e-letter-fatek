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
    </tr>
  </thead>
  <tbody>
    @foreach ($surat as $surats)
    <tr>
        
      <th scope="row">{{ $loop->iteration }}</th>
      <td>{{ $surats->no_surat}}</td>
      <td>{{ $surats->title }}</td>
      <td><a href="/surat/{{ $surats->no_surat }}" target="_blank" class="text-danger">PDF</a></td>
      <td>{{ $surats->name }}</td>

    </tr>
    @endforeach
  </tbody>
</table>
</div>
@endsection