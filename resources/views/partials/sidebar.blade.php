      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
              <li class="nav-item">
                  <a class="nav-link" href="{{ asset('/') }}">
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
                              <a class="nav-link" href="{{ route('tiket.new.index') }}">New Ticket</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link" href="pages/forms/basic_elements.html">Ticket List</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link" href="pages/forms/basic_elements.html">Open Ticket</a>
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
                  <a class="nav-link" data-toggle="collapse" href="#charts" aria-expanded="false"
                      aria-controls="charts">
                      <i class="ti-bookmark-alt menu-icon"></i>
                      <span class="menu-title">Laporan</span>
                      <i class="menu-arrow"></i>
                  </a>
                  <div class="collapse" id="charts">
                      <ul class="nav flex-column sub-menu">
                          <li class="nav-item"> <a class="nav-link" href="pages/charts/chartjs.html">ChartJs</a></li>
                      </ul>
                  </div>
              </li>
              <li class="nav-item">
                  <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                      <i class="icon-head menu-icon"></i>
                      <span class="menu-title">User Pages</span>
                      <i class="menu-arrow"></i>
                  </a>
                  <div class="collapse" id="auth">
                      <ul class="nav flex-column sub-menu">
                          <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Login </a></li>
                          <li class="nav-item"> <a class="nav-link" href="pages/samples/register.html"> Register </a>
                          </li>
                      </ul>
                  </div>
              </li>
          </ul>
      </nav>
      <!-- partial -->
