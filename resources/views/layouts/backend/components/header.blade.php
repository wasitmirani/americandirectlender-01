    <div class="page-main-header">
        {{-- /  <img class="img-fluid" style="    width: 51px;
            height: 40px;" src="{{asset('frontend/assets/images/logo.png')}}" alt=""> --}}
      <div class="main-header-right row m-0">
        <div class="main-header-left">
          <div class="logo-wrapper" style="text-align: center; font-size: 16px;" ><a href="{{route('dashboard')}}"><small><strong>
            </a>{{config('app.name')}}</strong>  </small> </a></div>
          <div class="dark-logo-wrapper"><a href="{{route('dashboard')}}"><img class="img-fluid" src="{{asset('frontend/assets/images/dark-logo.png')}}" alt=""></a></div>
          <div class="toggle-sidebar"><i class="status_toggle middle" data-feather="align-center" id="sidebar-toggle"></i></div>
        </div>
        <div class="left-menu-header col mt-4">
          <ul>
            <li>
              {{-- <form class="form-inline search-form">
                <div class="search-bg"><i class="fa fa-search"></i>
                  <input class="form-control-plaintext" placeholder="Search here.....">
                </div>
              </form><span class="d-sm-none mobile-search search-bg"><i class="fa fa-search"></i></span> --}}
            </li>
          </ul>
        </div>
        <div class="nav-right col pull-right right-menu p-0">
          <ul class="nav-menus">
            <li><a class="text-dark" href="#!" onclick="javascript:toggleFullScreen()"><i data-feather="maximize"></i></a></li>

            <li class="onhover-dropdown">

              <div class="notification-box"><i data-feather="bell"></i><span class="dot-animated text-danger">{{count(auth()->user()->unreadNotifications )}}</span></div>

              <ul class="notification-dropdown onhover-show-div">

                  @foreach (auth()->user()->unreadNotifications as $notification)
                  <router-link to="/send/notify">
                  <li class="noti-primary">
                    <div class="media"><span class="notification-bg bg-light-primary"><i class="fas fa-bell text-primary"></i></span>
                      <div class="media-body">


                        @foreach($notification['data'] as $notify)
                        <div class="media-body">
                            <span>

                                    {{ $notify  }}

                                </span>
                            <p class="f-12 light-font"></p>
                            {{-- <p class="f-12 light-font">dsj</p> --}}
                          </div>
                        @endforeach

                          <p class="f-12">{{$notification->created_at->diffForHumans()}}</p>
                          <p></p>

                      </div>
                    </div>
                  </li>
                </router-link>
                  @endforeach
              </ul>
            </li>

            <li class="onhover-dropdown p-0">
              <button class="btn btn-primary-light" type="button"><a href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();"><i data-feather="log-out"></i>Log out</a></button>
                 <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
          </ul>
        </div>
        <div class="d-lg-none mobile-toggle pull-right w-auto"><i data-feather="more-horizontal"></i></div>
      </div>
    </div>
