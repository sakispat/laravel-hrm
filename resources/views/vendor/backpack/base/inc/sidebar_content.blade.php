{{-- This file is used to store sidebar items, inside the Backpack admin panel --}}
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>

<li class="nav-item"><a class="nav-link" href="{{ backpack_url('user') }}"><i class="nav-icon la la-user"></i> {{ __('base.user') }}</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('area') }}"><i class="nav-icon la la-thumb-tack"></i> {{ __('crud.areas') }}</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('employee') }}"><i class="nav-icon la la-users"></i> {{ __('crud.employees') }}</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('program') }}"><i class="nav-icon la la-calendar"></i> {{ __('crud.programs') }}</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('shift') }}"><i class="nav-icon la la-tachometer"></i> {{ __('crud.shifts') }}</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('task') }}"><i class="nav-icon la la-tasks"></i> {{ __('crud.tasks') }}</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('group-task') }}"><i class="nav-icon la la-user-friends"></i> {{ __('crud.group tasks') }}</a></li>
