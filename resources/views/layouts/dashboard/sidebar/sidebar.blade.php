<div class="main-sidebar sidebar-style-2">
          <aside id="sidebar-wrapper">
            <div class="sidebar-brand">
              <a href="/">E-Letter Fatek</a>
            </div>
            <div class="sidebar-brand sidebar-brand-sm">
              <a href="/">FT</a>
            </div>
            <ul class="sidebar-menu">
              <li class="menu-header">Dashboard</li>
              <li class="dropdown {{ Request::is('/') ? 'active' : '' }}">
                <a href="/"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a>
            </li>
              <li class="menu-header">Letter</li>
              @if (!auth()->user()->hasRole('admin'))
              <li class="dropdown {{ Request::is('surat-masuk', 'surat-keluar') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="far fa-file-alt"></i> <span>Inbox</span></a>
                  <ul class="dropdown-menu">
                    <li><a class="nav-link" href="/surat-masuk">Surat Masuk</a></li>
                    <li><a class="nav-link" href="/surat-keluar">Surat Keluar</a></li>
                  </ul>
                @else
                <li class="dropdown {{ Request::is('surat-prodi-ti', 'surat-prodi-ptik', 'surat-prodi-sipil') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="far fa-file-alt"></i> <span>Inbox</span></a>
                  <ul class="dropdown-menu">
                    <li><a class="nav-link" href="/surat-prodi-ti">Surat Prodi TI</a></li>
                    <li><a class="nav-link" href="/surat-prodi-ptik">Surat Prodi PTIK</a></li>
                    <li><a class="nav-link" href="">Surat Prodi Sipil</a></li>
                  </ul>
                @endif
              </li>
              <li class="menu-header">Management Role</li>
              <li class="dropdown {{ Request::is('users-prodi-ti', 'users-prodi-ptik', 'users-prodi-sipil') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="far fa-user"></i> <span>Users</span></a>
                <ul class="dropdown-menu">
                  @if(auth()->user()->prodi_id == 1 || auth()->user()->hasRole('admin'))
                  <li><a class="nav-link" href="/users-prodi-ti">Prodi Teknik Informatika</a></li>
                  @endif
                  @if(auth()->user()->prodi_id == 2 || auth()->user()->hasRole('admin'))
                  <li><a class="nav-link" href="/users-prodi-ptik">Prodi PTIK</a></li>   
                  @endif
                  @if(auth()->user()->prodi_id == 3 || auth()->user()->hasRole('admin'))
                  <li><a class="nav-link" href="/users-prodi-sipil">Prodi Teknik Sipil</a></li>
                  @endif
                </ul>
              </li>
            </ul>
            @role(['admin', 'pimpro'])
            <div class="mt-3 p-3 hide-sidebar-mini">
              <a href="/register" target="_blank" class="btn btn-primary btn-lg btn-block btn-icon-split"> Registrasi User </a>
            </div>
            @endrole
            
            @role(['pegawai', 'pimpro'])
            <div class="p-3 hide-sidebar-mini">
              <a href="/buat-surat" class="btn btn-primary btn-lg btn-block btn-icon-split"> Buat Surat </a>
            </div>     
            @endrole
          </aside>
        </div>