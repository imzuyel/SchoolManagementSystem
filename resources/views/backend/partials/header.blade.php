<header class="top-header">
  <nav class="navbar navbar-expand">
    <div class="left-topbar d-flex align-items-center">
      <a href="javascript:;"
        class="toggle-btn"> <i class="bx bx-menu"></i>
      </a>
    </div>
    <div class="flex-grow-1 search-bar">
      <div class="input-group">
        <div class="input-group-prepend search-arrow-back">
          <button class="btn btn-search-back"
            type="button"><i class="bx bx-arrow-back"></i>
          </button>
        </div>
        <input type="text"
          class="form-control"
          placeholder="search" />
        <div class="input-group-append">
          <button class="btn btn-search"
            type="button"><i class="lni lni-search-alt"></i>
          </button>
        </div>
      </div>
    </div>
    <div class="ml-auto right-topbar">
      <ul class="navbar-nav">
        <li class="nav-item search-btn-mobile">
          <a class="nav-link position-relative"
            href="javascript:;"> <i class="bx bx-search vertical-align-middle"></i>
          </a>
        </li>


        <li class="nav-item dropdown dropdown-user-profile">
          <a class="nav-link dropdown-toggle dropdown-toggle-nocaret"
            href="javascript:;"
            data-toggle="dropdown">
            <div class="media user-box align-items-center">
              <div class="media-body user-info">
                <p class="mb-0 user-name">{{ Auth()->user()->name }}</p>
                <p class="mb-0 designattion">Available</p>
              </div>
              <img src="{{ asset('/') }}images/zuyel.jpg"
                class="user-img"
                alt="user avatar">
            </div>
          </a>
          <div class="dropdown-menu dropdown-menu-right">
            @auth
              <a class="dropdown-item"
                href="{{ route('user.profie') }}"><i class="bx bx-user"></i><span>Profile</span></a>
            @endauth

            <div class="mb-0 dropdown-divider"></div>
            <a class="dropdown-item"
              href="{{ route('logout') }}"
              onclick="event.preventDefault();
                                                                 document.getElementById('logout-form').submit();"><i
                class="bx bx-power-off"></i><span>Logout</span></a>
            <form id="logout-form"
              action="{{ route('logout') }}"
              method="POST"
              class="d-none">
              @csrf
            </form>
          </div>
        </li>

      </ul>
    </div>
  </nav>
</header>
