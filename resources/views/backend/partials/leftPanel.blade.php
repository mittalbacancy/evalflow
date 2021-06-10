<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->              
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
           
           <!--  <li class="{{ (request()->segment(2) == 'dashboard') ? 'active' : '' }}">
               <a href="{!! url('admin/dashboard') !!}">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
 -->
            @if (Auth::user()->hasRole("ROLE_ADMIN"))
            <li class="{{ (request()->segment(2) == 'admin') ? 'active' : '' }}">
                <a href="{!! url('admin/admin') !!}">
                    <i class="fa fa-user"></i> <span>Admin Management</span>
                </a>
            </li>
            @endif

            <li class="{{ (request()->segment(2) == 'users') ? 'active' : '' }}">
                @if (Auth::user()->hasRole("ROLE_ADMIN"))
                 <a href="{!! url('admin/users') !!}">
                @else
                 <a href="{!! url('hospital/users') !!}">  
                @endif  
                    <i class="fa fa-users"></i> <span>Resident Management</span>
                </a>
            </li>

            <li class="{{ (request()->segment(2) == 'doctors') ? 'active' : '' }}">
                @if (Auth::user()->hasRole("ROLE_ADMIN"))
                <a href="{!! url('admin/doctors') !!}">
                @else
                <a href="{!! url('hospital/doctors') !!}">
                @endif
                    <i class="fa fa-user-md"></i> <span>Attending Management</span>
                </a>
            </li>

            <li class="{{ (request()->segment(2) == 'viewsurvey') ? 'active' : '' }}">
                @if (Auth::user()->hasRole("ROLE_ADMIN"))
                <a href="{!! url('admin/viewsurvey') !!}">
                @else
                <a href="{!! url('hospital/viewsurvey') !!}">
                @endif 
                    <i class="fa fa-bar-chart"></i></i> <span>View Evaluations</span>
                </a>
            </li>

            @if (Auth::user()->hasRole("ROLE_ADMIN"))
            <li class="{{ (request()->segment(2) == 'evaluationcalculation') ? 'active' : '' }}">
                <a href="{!! url('admin/evaluationcalculation') !!}">
                    <i class="fa fa-calculator"></i> <span>Milestone Averages</span>
                </a>
            </li>
            @endif 

            <li class="{{ (request()->segment(2) == 'surveycreate') ? 'active' : '' }}">
                @if (Auth::user()->hasRole("ROLE_ADMIN"))
                <a href="{!! url('admin/surveycreate') !!}">
                @else
                <a href="{!! url('hospital/surveycreate') !!}">
                @endif
                    <i class="fa fa-user-md"></i> <span>Request Evaluation</span>
                </a>
            </li>  

            @if (Auth::user()->hasRole("ROLE_ADMIN"))
            <li class="{{ (request()->segment(2) == 'surveylist') ? 'active' : '' }}">
              <a href="{!! url('admin/surveylist') !!}">
                    <i class="fa fa-list"></i> <span>Evaluation List</span>
                </a>
            </li>
            @endif  

            @if (Auth::user()->hasRole("ROLE_ADMIN"))
            <li class="{{ (request()->segment(2) == 'questions') ? 'active' : '' }}">
              <a href="{!! url('admin/questions') !!}">
                    <i class="fa fa-question-circle"></i> <span>Questions & Answers List</span>
                </a>
            </li>
            @endif 

{{--             @if (Auth::user()->hasRole("ROLE_ADMIN"))
            <li class="{{ (request()->segment(2) == 'answers') ? 'active' : '' }}">
              <a href="{!! url('admin/answers') !!}">
                    <i class="fa fa-reply"></i> <span>Answers List</span>
                </a>
            </li>
            @endif --}}

            <li class="{{ (request()->segment(2) == 'schedulelist') ? 'active' : '' }}">
                @if (Auth::user()->hasRole("ROLE_ADMIN"))
                <a href="{!! url('admin/schedulelist') !!}">
                @else
                  <a href="{!! url('hospital/schedulelist') !!}">
                @endif 
                    <i class="fa fa-calendar-check-o"></i> <span>Requested Evaluations</span>
                </a>
            </li>

            <li class="{{ (request()->segment(2) == 'surveyrequest') ? 'active' : '' }}">
                @if (Auth::user()->hasRole("ROLE_ADMIN"))
                 <a href="{!! url('admin/surveyrequest') !!}">
                @else
                  <a href="{!! url('hospital/surveyrequest') !!}"> 
                @endif 
                    <i class="fa fa-calendar"></i> <span>Scheduled Evaluation</span>
                </a>
            </li>

            @if (Auth::user()->hasRole("ROLE_ADMIN"))
            <li class="{{ (request()->segment(2) == 'hospitals') ? 'active' : '' }}">
              <a href="{!! url('admin/hospitals') !!}">
                    <i class="fa fa-h-square"></i> <span>Hospital Management</span>
                </a>
            </li>
            @endif 

            @if (Auth::user()->hasRole("ROLE_ADMIN"))
            <li class="{{ (request()->segment(2) == 'emailtemplates') ? 'active' : '' }}">
                <a href="{!! url('admin/emailtemplates') !!}">
                    <i class="fa fa-envelope"></i> <span>Email Management</span>
                </a>
            </li>
            @endif


           



 
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
