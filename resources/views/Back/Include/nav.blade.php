@section('nav')

<div class="nav">
    <div class="nav-top">
        <img src="{{URL::to('userImage/'. Auth::User()->image)}}">
        <h4>{{Auth::User()->name}}</h4>

    </div>

    <div class="navlinks">
        <div class="menu">
            <ul>
                @if(\App\Model\User::role(Auth::id()) == \App\Model\User::ADMIN)
                <li><a href="{{route('dashboard')}}"><i class="glyphicon glyphicon-dashboard"> </i> Dashboard</a></li>
                @else
                <li><a href="{{route('user-dashboard')}}"><i class="glyphicon glyphicon-dashboard"> </i> Dashboard</a></li>
                @endif

                @if(\App\Model\User::role(Auth::id()) == \App\Model\User::ADMIN)

                <li class="drop-down"><a href=""><i class="glyphicon glyphicon-user"> </i>  Users</a>
                    <ul>
                        <li><a href="{{route('add')}}"><i class="fa fa-plus"></i> Add User</a></li>
                        <li><a href="{{route('admin-user')}}"><i class="fa fa-user"></i> Users</a></li>

                    </ul>
                </li>
                @endif
                <li><a href="{{route('profile')}}"><i class="glyphicon glyphicon-info-sign"> </i> Profile</a></li>

                <li><a href="{{route('setting')}}"><i class="glyphicon glyphicon-cog"> </i> Settings</a></li>

                    @if(\App\Model\User::role(Auth::id()) == \App\Model\User::ADMIN)
                    <li class="drop-down"><a href=""><i class="glyphicon glyphicon-new-window"> </i>  Task</a>
                    <ul>

                        <li><a href="{{route('task')}}"><i class="fa fa-plus"></i> Create Task</a></li>
                            <li><a href="{{route('admin-task')}}"><i class="fa fa-plus"></i> Tasks</a></li>

                    </ul>
                </li>
                    @endif
                    @if(\App\Model\User::role(Auth::id()) == \App\Model\User::ADMIN)
                    <li class="drop-down"><a href=""><i class="glyphicon glyphicon-new-window"> </i>  Pool</a>
                    <ul>
                        <li><a href="{{route('pool')}}"><i class="fa fa-plus"></i> Create Pool Task</a></li>
                        <li><a href="{{route('show-pool')}}"><i class="fa fa-plus"></i> Pool Task</a></li>
                    </ul>
                </li>
                    @endif
                    <li><a href="{{route('logout')}}"><i class="glyphicon glyphicon-log-out"> </i>  Log Out</a></li>
            </ul>
        </div>
    </div>
</div>
@endsection