<div class="sidebar">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="#" class="simple-text logo-normal">Lachimolala</a>
        </div>
        <ul class="nav">
            <li>
                <a href="{{ url('/prof/dashboard') }}">
                    <i class="tim-icons icon-chart-pie-36"></i>
                    <p>{{ __('Dashboard') }}</p>
                </a>
            </li>
            <li>
                <a data-toggle="collapse" href="javascript:void(0)" data-target="#niv">
                    <i class="tim-icons icon-laptop" ></i>
                    <span class="nav-link-text" >My Classes</span>
                    <b class="caret mt-1"></b>
                </a>
                <div class="collapse" id="niv">
                    <ul class="nav pl-4">
                        <li>
                            <a href="{{ route('MesClasse')  }}">
                                <i class="tim-icons icon-bullet-list-67"></i>
                                <p>List</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li>
                <a data-toggle="collapse" href="javascript:void(0)" data-target="#classe">
                    <i class="tim-icons icon-align-center" ></i>
                    <span class="nav-link-text" >Absence</span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse" id="classe">
                    <ul class="nav pl-4">
                        <li>
                            <a href="{{ route('Absence.index')  }}">
                                <i class="tim-icons icon-bullet-list-67"></i>
                                <p>List</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li>
                <a data-toggle="collapse" href="javascript:void(0)" data-target="#exam">
                    <i class="tim-icons icon-atom" ></i>
                    <span class="nav-link-text" >Controle
                    </span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse" id="exam">
                    <ul class="nav pl-4">
                        <li>
                            <a href="{{ route('Controle.index')  }}">
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
