
<div class="sidebar">
    <nav class="sidebar-nav">

        <ul class="nav">

            <li class="nav-item">
                <a href="{{ route("home") }}" class="nav-link">
                    <i class="nav-icon fas fa-home">

                    </i>
                Home
                </a>
            </li>


          <li class="nav-item">
                <a href="{{route('profile',$user->id)}}" class="nav-link">
                    <i class="fas fa-user-circle"></i>

                    </i>
                    {{ trans('cruds.job.fields.myaccount') }}
                </a>
            </li>





                <li class="nav-item">
                    <a href="{{ route("admin.jobs.index") }}" class="nav-link {{ request()->is('admin/jobs') || request()->is('admin/jobs/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-briefcase nav-icon">

                        </i>
                        {{ trans('cruds.job.title') }}
                    </a>
                </li>



            <li class="nav-item">
                <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                    <i class="nav-icon fas fa-fw fa-sign-out-alt">

                    </i>
                    {{ trans('global.logout') }}
                </a>
            </li>
        </ul>

    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>
