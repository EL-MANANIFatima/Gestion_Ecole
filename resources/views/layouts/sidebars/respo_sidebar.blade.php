<div class="sidebar">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="#" class="simple-text logo-normal">Lachimolala</a>
        </div>
        <ul class="nav">
            <li>
                <a href="{{ url('/respo/dashboard') }}">
                    <i class="tim-icons icon-chart-pie-36"></i>
                    <p>{{ __('Dashboard') }}</p>
                </a>
            </li>
            <li>
                <a data-toggle="collapse" href="javascript:void(0)" data-target="#niv">
                    <i class="tim-icons icon-heart-2" ></i>
                    <span class="nav-link-text" >Kids</span>
                    <b class="caret mt-1"></b>
                </a>
                <div class="collapse" id="niv">
                    <ul class="nav pl-4">
                        <li>
                            <a href="{{ route('Super.index')  }}">
                                <i class="tim-icons icon-bullet-list-67"></i>
                                <p>List</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li>
                <a href="{{ route('profile.edit')  }}">
                    <i class="tim-icons icon-single-02"></i>
                    <p>{{ __('User Profile') }}</p>
                </a>
            </li>
        </ul>
    </div>
</div>
