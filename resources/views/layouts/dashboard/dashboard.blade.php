@extends('layouts.dashboard.main.main')

@section('container')
  
    <div class="row">
              <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                  <div class="card-icon bg-danger">
                    <i class="far fa-user"></i>
                  </div>
                  <div class="card-wrap">
                    <div class="card-header">
                      <h4>Users</h4>
                    </div>
                    <div class="card-body">{{ $count1 }}</div>
                  </div>
                </div>
              </div>
              @if (!auth()->user()->hasRole('admin'))
              <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                  <div class="card-icon bg-success">
                    <i class="far fa-envelope"></i>
                  </div>
                   <div class="card-wrap">
                    <div class="card-header">
                      <h4>Surat Dikirim</h4>
                    </div>
                    <div class="card-body">{{ $count2 }}</div>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                  <div class="card-icon bg-warning">
                    <i class="fas fa-envelope-open-text"></i>
                  </div>
                  <div class="card-wrap">
                    <div class="card-header">
                      <h4>Surat Diterima</h4>
                    </div>
                    <div class="card-body">{{ $count3 }}</div>
                  </div>
                  @else
                  <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                  <div class="card-icon bg-success">
                    <i class="far fa-envelope"></i>
                  </div>
                   <div class="card-wrap">
                    <div class="card-header">
                      <h4>Surat Prodi TI</h4>
                    </div>
                    <div class="card-body">{{ $prodi_ti }}</div>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                  <div class="card-icon bg-warning">
                    <i class="far fa-envelope"></i>
                  </div>
                  <div class="card-wrap">
                    <div class="card-header">
                      <h4>Surat Prodi PTIK</h4>
                    </div>
                    <div class="card-body">{{ $prodi_ptik }}</div>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                  <div class="card-icon bg-info">
                    <i class="far fa-envelope"></i>
                  </div>
                  <div class="card-wrap">
                    <div class="card-header">
                      <h4>Surat Prodi Sipil</h4>
                    </div>
                    <div class="card-body">{{ $prodi_sipil }}</div>
                  </div>
                </div>
              </div>
              @endif
            </div>
            
@endsection