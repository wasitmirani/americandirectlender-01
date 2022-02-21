<header class="main-nav">
    <div class="sidebar-user text-center">
        @if(Auth::user()->thumbnail)
        <img class="img-90 rounded-circle" src="{{ Auth::user()->thumbnail  }}" alt="">
        @else
        <img class="img-90 rounded-circle" src="../assets/images/dashboard/1.png" alt="">
        @endif
        <h6 class="mt-3 f-14 f-w-600">{{ Auth::user()->name }}</h6>
        @if(!empty(Auth::user()->roles->first()->name))
      <p class="mb-0 font-roboto">{{ Auth::user()->roles->first()->name }}</p>
      @endif
      </ul>
    </div>
    @php
    $sidebar=sideBarMenu();
    // dd($sidebar);
    @endphp
    <nav>
      <div class="main-navbar">
        <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
        <div id="mainnav">
          <ul class="nav-menu custom-scrollbar">
            <li class="back-btn">
              <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
            </li>

            @foreach ($sidebar as $menu)
             @if(!empty($menu['heading']))
             <li class="sidebar-main-title" @if(isset($menu['v-can'])) v-can="'{{$menu['v-can']}}'" @endif>
                <div>
                  <h6>{{$menu['heading']}}</h6>
                </div>
              </li>
            @endif

            @if(!empty($menu['menu']))
              <li class="dropdown" @if(isset($menu['v-can'])) v-can="'{{$menu['v-can']}}'" @endif><a class="nav-link menu-title" href="javascript:void(0)"> <i data-feather="{{$menu['menu']['icon']}}" ></i> <span>{{$menu['menu']['title']}}</span></a>
                <ul class="nav-submenu menu-content">
                    @foreach ($menu['menu']['sub_menu'] as $item)
                      <li @if(isset($item['v-can'])) v-can="'{{$item['v-can']}}'" @endif><router-link exact to="{{$item['v-route']}}" >{{$item['title']}}</router-link></li>
                    @endforeach
                </ul>
              </li>
            @endif

            @if(!empty($menu['single_link']))
            <li class="dropdown" @if(isset($menu['single_link']['v-can'])) v-can="'{{$menu['single_link']['v-can']}}'" @endif><router-link exact to="{{$menu['single_link']['v-route']}}" class="nav-link menu-title link-nav" > <i data-feather="{{$menu['single_link']['icon']}}" ></i>
                <span>{{$menu['single_link']['title']}}</span></router-link>
            </li>
            @endif

            @endforeach
            <li class="dropdown">
                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();"><i data-feather="log-out"></i>Log out</a>
                 <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
          </ul>
        </div>
        <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
      </div>
    </nav>
  </header>
