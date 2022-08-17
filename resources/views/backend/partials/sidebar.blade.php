<div class="sidebar-wrapper"
  data-simplebar="true">
  <div class="sidebar-header">
    <div class="">
      <img src="{{ asset('assets/images/logo-icon.png') }}"
        class="logo-icon-2"
        alt="" />
    </div>
    <div>
      <h4 class="logo-text">{{ config('app.name') }}</h4>
    </div>
    <a href="javascript:;"
      class="ml-auto toggle-btn"> <i class="bx bx-menu"></i>
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
        <li class="{{ Request::is('user') ? 'mm-active' : '' }} {{ Request::is('user/*/edit') ? 'mm-active' : '' }}">
          <a href="{{ route('user.index') }}"><i class="bx bx-right-arrow-alt"></i>Manage</a>
        </li>
        <li class="{{ Request::is('user/create/') ? 'mm-active' : '' }}"> <a href="{{ route('user.create') }}"><i
              class="bx bx-plus"></i>Add</a>
        </li>
        @auth
          <li class="{{ Request::is('user/profile/*') ? 'mm-active' : '' }}"> <a href="{{ route('user.profie') }}"><i
                class="bx bx-right-arrow-alt"></i>Profile</a>
          </li>
        @endauth
      </ul>
    </li>

    <li class="menu-label">Setup</li>
    <li>
      <a class="has-arrow"
        href="javascript:;">
        <div class="parent-icon icon-color-11"><i class="bx bx-menu"></i>
        </div>
        <div class="menu-title">Setup Management</div>
      </a>
      <ul class="{{ Request::is('setup/*') ? 'mm-show' : '' }}">

        <li class="{{ Request::is('setup/class/*') ? 'mm-active' : '' }}">
          <a class="has-arrow"
            href="javascript:;">
            <div class=" icon-color-1"> <i class="bx bx-comment-edit"></i>
            </div>
            <div class="menu-title">Class</div>
          </a>
          <ul class="{{ Request::is('setup/class/*') ? 'mm-show' : '' }}">
            <li class="{{ Request::is('setup/class/*/edit') ? 'mm-active' : '' }}"> <a
                href="{{ route('setup.class.index') }}"><i class="bx bx-add-to-queue">
                </i>Manage</a>
            </li>
            <li class="{{ Request::is('setup/class/create') ? 'mm-active' : '' }}"> <a
                href="{{ route('setup.class.create') }}"><i class="bx bx-plus"></i>Add</a>
            </li>
          </ul>
        </li>

        <li class="{{ Request::is('setup/year/*') ? 'mm-active' : '' }}">
          <a class="has-arrow"
            href="javascript:;">
            <div class=" icon-color-1"> <i class="bx bx-comment-edit"></i>
            </div>
            <div class="menu-title">Year</div>
          </a>
          <ul class="{{ Request::is('setup/year/*') ? 'mm-show' : '' }}">
            <li class="{{ Request::is('setup/year/*/edit') ? 'mm-active' : '' }}"> <a
                href="{{ route('setup.year.index') }}"><i class="bx bx-add-to-queue">
                </i>Manage</a>
            </li>
            <li class="{{ Request::is('setup/year/create') ? 'mm-active' : '' }}"> <a
                href="{{ route('setup.year.create') }}"><i class="bx bx-plus"></i>Add</a>
            </li>
          </ul>
        </li>

        <li class="{{ Request::is('setup/group/*') ? 'mm-active' : '' }}">
          <a class="has-arrow"
            href="javascript:;">
            <div class="icon-color-8"> <i class="bx bx-comment-edit"></i>
            </div>
            <div class="menu-title">Group</div>
          </a>
          <ul class="{{ Request::is('setup/group/*') ? 'mm-show' : '' }}">
            <li class="{{ Request::is('setup/group/*/edit') ? 'mm-active' : '' }}"> <a
                href="{{ route('setup.group.index') }}"><i class="bx bx-add-to-queue">
                </i>Manage</a>
            </li>
            <li class="{{ Request::is('setup/group/create') ? 'mm-active' : '' }}"> <a
                href="{{ route('setup.group.create') }}"><i class="bx bx-plus"></i>Add</a>
            </li>
          </ul>
        </li>

        <li class="{{ Request::is('setup/shift/*') ? 'mm-active' : '' }}">
          <a class="has-arrow"
            href="javascript:;">
            <div class=" icon-color-3"> <i class="bx bx-comment-edit"></i>
            </div>
            <div class="menu-title">Shift</div>
          </a>
          <ul class="{{ Request::is('setup/shift/*') ? 'mm-show' : '' }}">
            <li class="{{ Request::is('setup/shift/*/edit') ? 'mm-active' : '' }}"> <a
                href="{{ route('setup.shift.index') }}"><i class="bx bx-add-to-queue">
                </i>Manage</a>
            </li>
            <li class="{{ Request::is('setup/shift/create') ? 'mm-active' : '' }}"> <a
                href="{{ route('setup.shift.create') }}"><i class="bx bx-plus"></i>Add</a>
            </li>
          </ul>
        </li>

        <li class="{{ Request::is('setup/feecategory/*') ? 'mm-active' : '' }}">
          <a class="has-arrow"
            href="javascript:;">
            <div class=" icon-color-1"> <i class="bx bx-comment-edit"></i>
            </div>
            <div class="menu-title">Fee category</div>
          </a>
          <ul class="{{ Request::is('setup/feecategory/*') ? 'mm-show' : '' }}">
            <li class="{{ Request::is('setup/feecategory/*/edit') ? 'mm-active' : '' }}"> <a
                href="{{ route('setup.feecategory.index') }}"><i class="bx bx-add-to-queue">
                </i>Manage</a>
            </li>
            <li class="{{ Request::is('setup/feecategory/create') ? 'mm-active' : '' }}"> <a
                href="{{ route('setup.feecategory.create') }}"><i class="bx bx-plus"></i>Add</a>
            </li>
          </ul>
        </li>

        <li class="{{ Request::is('setup/feeamount/*') ? 'mm-active' : '' }}">
          <a class="has-arrow"
            href="javascript:;">
            <div class=" icon-color-1"> <i class="bx bx-comment-edit"></i>
            </div>
            <div class="menu-title">Fee Amount</div>
          </a>
          <ul class="{{ Request::is('setup/feeamount/*') ? 'mm-show' : '' }}">
            <li
              class="{{ Request::is('setup/feeamount/*/edit') ? 'mm-active' : '' }} {{ Request::is('setup/feeamount/*') ? 'mm-active' : '' }} {{ Request::is('setup/feeamount/create') ? '' : '' }} class-active">
              <a href="{{ route('setup.feeamount.index') }}"><i class="bx bx-add-to-queue">
                </i>Manage</a>
            </li>
            <li class="{{ Request::is('setup/feeamount/create') ? 'mm-active' : '' }}"> <a
                href="{{ route('setup.feeamount.create') }}"><i class="bx bx-plus"></i>Add</a>
            </li>
          </ul>
        </li>

        <li class="{{ Request::is('setup/examtype/*') ? 'mm-active' : '' }}">
          <a class="has-arrow"
            href="javascript:;">
            <div class=" icon-color-1"> <i class="bx bx-comment-edit"></i>
            </div>
            <div class="menu-title">Exam-type</div>
          </a>
          <ul class="{{ Request::is('setup/examtype/*') ? 'mm-show' : '' }}">
            <li class="{{ Request::is('setup/examtype/*/edit') ? 'mm-active' : '' }}"> <a
                href="{{ route('setup.examtype.index') }}"><i class="bx bx-add-to-queue">
                </i>Manage</a>
            </li>
            <li class="{{ Request::is('setup/examtype/create') ? 'mm-active' : '' }}"> <a
                href="{{ route('setup.examtype.create') }}"><i class="bx bx-plus"></i>Add</a>
            </li>
          </ul>
        </li>
        <li class="{{ Request::is('setup/subject/*') ? 'mm-active' : '' }}">
          <a class="has-arrow"
            href="javascript:;">
            <div class=" icon-color-1"> <i class="bx bx-comment-edit"></i>
            </div>
            <div class="menu-title">School subject</div>
          </a>
          <ul class="{{ Request::is('setup/subject/*') ? 'mm-show' : '' }}">
            <li class="{{ Request::is('setup/subject/*/edit') ? 'mm-active' : '' }}"> <a
                href="{{ route('setup.subject.index') }}"><i class="bx bx-add-to-queue">
                </i>Manage</a>
            </li>
            <li class="{{ Request::is('setup/subject/create') ? 'mm-active' : '' }}"> <a
                href="{{ route('setup.subject.create') }}"><i class="bx bx-plus"></i>Add</a>
            </li>
          </ul>
        </li>
        <li class="{{ Request::is('setup/assignsubject/*') ? 'mm-active' : '' }}">
          <a class="has-arrow"
            href="javascript:;">
            <div class=" icon-color-1"> <i class="bx bx-comment-edit"></i>
            </div>
            <div class="menu-title">Assign subject</div>
          </a>
          <ul class="{{ Request::is('setup/assignsubject/*') ? 'mm-show' : '' }}">
            <li
              class="{{ Request::is('setup/assignsubject/*/edit') ? 'mm-active' : '' }} {{ Request::is('setup/assignsubject/*') ? 'mm-active' : '' }} {{ Request::is('setup/assignsubject/create') ? '' : '' }} class-active">
              <a href="{{ route('setup.assignsubject.index') }}"><i class="bx bx-add-to-queue">
                </i>Manage</a>
            </li>
            <li class="{{ Request::is('setup/assignsubject/create') ? 'mm-active' : '' }}"> <a
                href="{{ route('setup.assignsubject.create') }}"><i class="bx bx-plus"></i>Add</a>
            </li>
          </ul>
        </li>

        <li class="{{ Request::is('setup/designation/*') ? 'mm-active' : '' }}">
          <a class="has-arrow"
            href="javascript:;">
            <div class=" icon-color-1"> <i class="bx bx-comment-edit"></i>
            </div>
            <div class="menu-title">Designation</div>
          </a>
          <ul class="{{ Request::is('setup/designation/*') ? 'mm-show' : '' }}">
            <li class="{{ Request::is('setup/designation/*/edit') ? 'mm-active' : '' }}"> <a
                href="{{ route('setup.designation.index') }}"><i class="bx bx-add-to-queue">
                </i>Manage</a>
            </li>
            <li class="{{ Request::is('setup/designation/create') ? 'mm-active' : '' }}"> <a
                href="{{ route('setup.designation.create') }}"><i class="bx bx-plus"></i>Add</a>
            </li>
          </ul>
        </li>

      </ul>
    </li>

    <li class="menu-label">Student</li>
    <li>
      <a class="has-arrow"
        href="javascript:;">
        <div class="parent-icon icon-color-11"><i class="bx bx-menu"></i>
        </div>
        <div class="menu-title">Student </div>
      </a>
      <ul class="{{ Request::is('student/*') ? 'mm-show' : '' }}">
        <li class="{{ Request::is('student/assingstudent/*') ? 'mm-active' : '' }}">
          <a class="has-arrow"
            href="javascript:;">
            <div class=" icon-color-1"> <i class="bx bx-comment-edit"></i>
            </div>
            <div class="menu-title">Register</div>
          </a>
          <ul class="{{ Request::is('student/assingstudent/*') ? 'mm-show' : '' }}">
            <li
              class="{{ Request::is('student/assingstudent/*/edit') ? 'mm-active' : '' }} {{ Request::is('student/assing/student/*') ? 'mm-active' : '' }} class-active-2">
              <a href="{{ route('student.assingstudent.index') }}"><i class="bx bx-add-to-queue">
                </i>Manage</a>
            </li>
            <li class="{{ Request::is('student/assingstudent/create') ? 'mm-active' : '' }}"> <a
                href="{{ route('student.assingstudent.create') }}"><i class="bx bx-plus"></i>Add</a>
            </li>

          </ul>
        </li>
        <li class="{{ Request::is('student/roll/generate') ? 'mm-active' : '' }}">
          <a href="{{ route('student.rollgenerate') }}">
            <div class=" icon-color-1"> <i class="bx bx-comment-edit"></i>
            </div>
            <div class="menu-title">Roll</div>
          </a>
        </li>
        <li class="{{ Request::is('student/resgistration/fee') ? 'mm-active' : '' }}">
          <a href="{{ route('student.regFee') }}">
            <div class=" icon-color-1"> <i class="bx bx-comment-edit"></i>
            </div>
            <div class="menu-title">Register Fee</div>
          </a>
        </li>
        <li class="{{ Request::is('student/monthly/fee') ? 'mm-active' : '' }}">
          <a href="{{ route('student.monthlyFee') }}">
            <div class=" icon-color-1"> <i class="bx bx-comment-edit"></i>
            </div>
            <div class="menu-title">Monthly Fee</div>
          </a>
        </li>

        <li class="{{ Request::is('student/exam/fee') ? 'mm-active' : '' }}">
          <a href="{{ route('student.examFee') }}">
            <div class=" icon-color-1"> <i class="bx bx-comment-edit"></i>
            </div>
            <div class="menu-title">Exam Fee</div>
          </a>
        </li>

      </ul>
    </li>

    <li class="menu-label">Employee</li>
    <li>
      <a class="has-arrow"
        href="javascript:;">
        <div class="parent-icon icon-color-11"><i class="bx bx-menu"></i>
        </div>
        <div class="menu-title">Employee </div>
      </a>
      <ul class="{{ Request::is('employee/*') ? 'mm-show' : '' }}">
        <li class="{{ Request::is('employee/register/*') ? 'mm-active' : '' }}">
          <a class="has-arrow"
            href="javascript:;">
            <div class=" icon-color-1"> <i class="bx bx-comment-edit"></i>
            </div>
            <div class="menu-title">Register</div>
          </a>
          <ul class="{{ Request::is('employee/register/*') ? 'mm-show' : '' }}">
            <li
              class="{{ Request::is('employee/register/*/edit') ? 'mm-active' : '' }} {{ Request::is('student/assing/student/*') ? 'mm-active' : '' }} class-active-2">
              <a href="{{ route('employee.register.index') }}"><i class="bx bx-add-to-queue">
                </i>Manage</a>
            </li>
            <li class="{{ Request::is('employee/register/create') ? 'mm-active' : '' }}"> <a
                href="{{ route('employee.register.create') }}"><i class="bx bx-plus"></i>Add</a>
            </li>
          </ul>
        </li>

        <li class="{{ Request::is('employee/salary/*') ? 'mm-active' : '' }}">
          <a href="{{ route('employee.salary.index') }}">
            <div class=" icon-color-1"> <i class="bx bx-comment-edit"></i>
            </div>
            <div class="menu-title">Salary</div>
          </a>

        </li>

      </ul>
    </li>


  </ul>
  <!--end navigation-->
</div>
