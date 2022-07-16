<div class="sidebar-wrapper"
  data-simplebar="true">
  <div class="sidebar-header">
    <div class="">
      <img src="{{ asset('assets/images/logo-icon.png') }}"
        class="logo-icon-2"
        alt="" />
    </div>
    <div>
      <h4 class="logo-text">Syndash</h4>
    </div>
    <a href="javascript:;"
      class="toggle-btn ml-auto"> <i class="bx bx-menu"></i>
    </a>
  </div>
  <!--navigation-->
  <ul class="metismenu"
    id="menu">
    <li class="{{ Request::is('/') ? 'mm-active' : '' }} {{ Request::is('dashboard') ? 'mm-active' : '' }}">
      <a href="/">
        <div class="parent-icon icon-color-1">
          <i class="bx bx-home-alt"></i>
        </div>
        <div class="menu-title">Dashboard</div>
      </a>
    </li>
    <li class="menu-label">Mentor Elements</li>

    <li class="{{ Request::is('user/*') ? 'mm-active' : '' }}">
      <a class="has-arrow"
        href="javascript:;">
        <div class="parent-icon icon-color-11"><i class="bx bx-repeat"></i>
        </div>
        <div class="menu-title">User</div>
      </a>
      <ul class="{{ Request::is('user/*') ? 'mm-show' : '' }}">
        <li
          class="{{ Request::is('user') ? 'mm-active' : '' }} {{ Request::is('user/*/edit') ? 'mm-active' : '' }}">
          <a href="{{ route('user.index') }}"><i class="bx bx-right-arrow-alt"></i>Manage User</a>
        </li>
        <li class="{{ Request::is('user/create/') ? 'mm-active' : '' }}"> <a href="{{ route('user.create') }}"><i
              class="bx bx-right-arrow-alt"></i>Add User</a>
        </li>
        @auth


          <li class="{{ Request::is('user/profile/*') ? 'mm-active' : '' }}"> <a
              href="{{ route('user.profie') }}"><i class="bx bx-right-arrow-alt"></i>Profile</a>
          </li>
        @endauth
      </ul>
    </li>

    <li class="menu-label">Setup</li>
    <li>
      <a class="has-arrow"
        href="javascript:;">
        <div class="parent-icon icon-color-1"> <i class="bx bx-comment-edit"></i>
        </div>
        <div class="menu-title">Class</div>
      </a>
      <ul>
        <li> <a href="form-elements.html"><i class="bx bx-right-arrow-alt"></i>Manage Class</a>
        <li> <a href="form-elements.html"><i class="bx bx-right-arrow-alt"></i>Add Class</a>
        </li>
      </ul>
    </li>
  </ul>
  <!--end navigation-->
</div>
