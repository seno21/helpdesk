      <!-- partial:partials/_sidebar.html -->
      {{-- Ini untuk Atasan --}}
      @if (Auth::user()->id_role === 1)
          <nav class="sidebar sidebar-offcanvas" id="sidebar">
              <ul class="nav">
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('dashboard') }}">
                          <i class="icon-grid menu-icon"></i>
                          <span class="menu-title">Beranda</span>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('search') }}" aria-controls="ui-basic">
                          <i class="ti-search menu-icon"></i>
                          <span class="menu-title">Lacak</span>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false"
                          aria-controls="form-elements">
                          <i class="ti-ticket menu-icon"></i>
                          <span class="menu-title">Tiket</span>
                          <i class="menu-arrow"></i>
                      </a>
                      <div class="collapse" id="form-elements">
                          <ul class="nav flex-column sub-menu">
                              {{-- <li class="nav-item">
                            <a class="nav-link" href="{{ route('tiket.new.index') }}">Tiket</a>
                        </li> --}}
                              <li class="nav-item">
                                  <a class="nav-link" href="{{ route('tiket.baru') }}">Tiket Baru</a>
                              </li>
                              <li class="nav-item">
                                  <a class="nav-link" href="{{ route('tiket.proses') }}">Tiket Proses</a>
                              </li>
                              <li class="nav-item">
                                  <a class="nav-link" href="{{ route('tiket.selesai') }}">Tiket Selesai</a>
                              </li>
                          </ul>
                      </div>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false"
                          aria-controls="auth">
                          <i class="icon-head menu-icon"></i>
                          <span class="menu-title">User Settings</span>
                          <i class="menu-arrow"></i>
                      </a>
                      <div class="collapse" id="auth">
                          <ul class="nav flex-column sub-menu">
                              <li class="nav-item"> <a class="nav-link" href="{{ route('user.editKaryawan') }}">Update
                                      Profile </a>
                              </li>
                              <li class="nav-item">
                                  <a class="nav-link" href="{{ route('profile.edit') }}"> Reset </a>
                              </li>
                          </ul>
                      </div>
                  </li>
              </ul>
          </nav>
      @endif

      {{-- Ini Untuk Petugas IT --}}
      @if (Auth::user()->id_role === 2)
          <nav class="sidebar sidebar-offcanvas" id="sidebar">
              <ul class="nav">
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('dashboard') }}">
                          <i class="icon-grid menu-icon"></i>
                          <span class="menu-title">Beranda</span>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('search') }}" aria-controls="ui-basic">
                          <i class="ti-search menu-icon"></i>
                          <span class="menu-title">Lacak</span>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false"
                          aria-controls="form-elements">
                          <i class="ti-ticket menu-icon"></i>
                          <span class="menu-title">Tiket</span>
                          <i class="menu-arrow"></i>
                      </a>
                      <div class="collapse" id="form-elements">
                          <ul class="nav flex-column sub-menu">
                              {{-- <li class="nav-item">
                                  <a class="nav-link" href="{{ route('tiket.new.index') }}">Tiket</a>
                              </li> --}}
                              <li class="nav-item">
                                  <a class="nav-link" href="{{ route('tiket.order.index') }}">Order</a>
                              </li>
                          </ul>
                      </div>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" data-toggle="collapse" href="#tables" aria-expanded="false"
                          aria-controls="tables">
                          <i class="ti-server menu-icon"></i>
                          <span class="menu-title">Master Data</span>
                          <i class="menu-arrow"></i>
                      </a>
                      <div class="collapse" id="tables">
                          <ul class="nav flex-column sub-menu">
                              <li class="nav-item">
                                  <a class="nav-link" href="{{ route('master.karyawan.index') }}">Karyawan</a>
                              </li>
                              <li class="nav-item">
                                  <a class="nav-link" href="{{ route('master.unit.index') }}">Unit</a>
                              </li>
                              <li class="nav-item">
                                  <a class="nav-link" href="{{ route('master.status.index') }}">Status</a>
                              </li>
                          </ul>
                      </div>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('laporan') }}" aria-expanded="false"
                          aria-controls="charts">
                          <i class="ti-bookmark-alt menu-icon"></i>
                          <span class="menu-title">History Ticket</span>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false"
                          aria-controls="auth">
                          <i class="icon-head menu-icon"></i>
                          <span class="menu-title">User Settings</span>
                          <i class="menu-arrow"></i>
                      </a>
                      <div class="collapse" id="auth">
                          <ul class="nav flex-column sub-menu">
                              <li class="nav-item"> <a class="nav-link"
                                      href="{{ route('user.editKaryawan') }}">Update
                                      Profile </a>
                              </li>
                              <li class="nav-item">
                                  <a class="nav-link" href="{{ route('profile.edit') }}"> Reset </a>
                              </li>
                          </ul>
                      </div>
                  </li>
              </ul>
          </nav>
      @endif

      {{-- Ini untuk USER --}}
      @if (Auth::user()->id_role === 3)
          <nav class="sidebar sidebar-offcanvas" id="sidebar">
              <ul class="nav">
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('dashboard') }}">
                          <i class="icon-grid menu-icon"></i>
                          <span class="menu-title">Beranda</span>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" data-toggle="collapse" href="#" aria-expanded="false"
                          aria-controls="ui-basic">
                          <i class="ti-search menu-icon"></i>
                          <span class="menu-title">Lacak</span>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false"
                          aria-controls="form-elements">
                          <i class="ti-ticket menu-icon"></i>
                          <span class="menu-title">Tiket</span>
                          <i class="menu-arrow"></i>
                      </a>
                      <div class="collapse" id="form-elements">
                          <ul class="nav flex-column sub-menu">
                              <li class="nav-item">
                                  <a class="nav-link" href="{{ route('tiket.baru') }}">Tiket Baru</a>
                              </li>
                              <li class="nav-item">
                                  <a class="nav-link" href="{{ route('tiket.proses') }}">Tiket Proses</a>
                              </li>
                              <li class="nav-item">
                                  <a class="nav-link" href="{{ route('tiket.selesai') }}">Tiket Selesai</a>
                              </li>
                          </ul>
                      </div>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('laporan') }}" aria-expanded="false"
                          aria-controls="charts">
                          <i class="ti-bookmark-alt menu-icon"></i>
                          <span class="menu-title">History Tiket</span>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false"
                          aria-controls="auth">
                          <i class="icon-head menu-icon"></i>
                          <span class="menu-title">User Settings</span>
                          <i class="menu-arrow"></i>
                      </a>
                      <div class="collapse" id="auth">
                          <ul class="nav flex-column sub-menu">
                              <li class="nav-item"> <a class="nav-link"
                                      href="{{ route('user.editKaryawan') }}">Update
                                      Profile </a>
                              </li>
                              <li class="nav-item">
                                  <a class="nav-link" href="{{ route('profile.edit') }}"> Reset </a>
                              </li>
                          </ul>
                      </div>
                  </li>
              </ul>
          </nav>
      @endif
      <!-- partial -->
