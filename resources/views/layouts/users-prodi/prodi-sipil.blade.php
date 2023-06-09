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
    </tr>
  </thead>
  <tbody>
      @foreach ($users as $user)
    <tr>
        <th scope="row">1</th>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->nip }}</td>
        <td>{{ $user->alamat }}</td>
        <td>{{ $user->ttl }}</td>
        <td>{{ $user->no_hp }}</td>
        <td>{{ $user->jabatan }}</td>
    </tr>
    @endforeach
  </tbody>
</table>

@endsection