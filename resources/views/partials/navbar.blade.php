  <!-- partial:partials/_navbar.html -->
  <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
          <a class="navbar-brand brand-logo mr-5" href="index.html"><img src="{{ asset('/images/logo.svg') }}"
                  class="mr-2" alt="logo" /></a>
          <a class="navbar-brand brand-logo-mini" href="index.html"><img src="{{ asset('/images/logo-mini.svg') }}"
                  alt="logo" /></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
              <span class="icon-menu"></span>
          </button>
          <ul class="navbar-nav navbar-nav-right">
              <li class="nav-item font-weight-bold">
                  {{ strtoupper(Auth::user()->name) }}
              </li>
              <li class="nav-item nav-profile dropdown">
                  <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                      <img src="{{ asset('/images/faces/user.png') }}" alt="profile" />
                  </a>
                  <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                      <div>
                          {{-- <h4>{{ $auth }}</h4> --}}
                      </div>
                      {{-- {{ route('profile.edit') }} --}}
                      <a href="#" class="dropdown-item">
                          <i class="ti-user text-primary"></i>
                          Profile
                      </a>

                      <form method="POST" action="{{ route('logout') }}">
                          @csrf

                          <a href="{{ route('logout') }}"
                              onclick="event.preventDefault();
                          this.closest('form').submit();"
                              class="dropdown-item">
                              <i class="ti-power-off text-primary"></i>
                              Logout
                          </a>
                      </form>
                  </div>
              </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
              data-toggle="offcanvas">
              <span class="icon-menu"></span>
          </button>
      </div>
  </nav>
  <!-- partial -->
