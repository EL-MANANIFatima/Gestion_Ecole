<div class="sidebar">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="#" class="simple-text logo-normal">Lachimolala</a>
        </div>
        <ul class="nav">
            <li>
                <a href="{{ url('/eleve/dashboard') }}">
                    <i class="tim-icons icon-chart-pie-36"></i>
                    <p>{{ __('Dashboard') }}</p>
                </a>
            </li>
            <li>
                <a data-toggle="collapse" href="javascript:void(0)" data-target="#exam">
                    <i class="tim-icons icon-atom" ></i>
                    <span class="nav-link-text" >Exmas</span>
                    <b class="caret mt-1"></b>
                </a>
                <div class="collapse" id="exam">
                    <ul class="nav pl-4">
                        <li>
                            <a href="{{ route('Exam.index')  }}">
                                <i class="tim-icons icon-bullet-list-67"></i>
                                <p>List</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li>
                <a data-toggle="collapse" href="javascript:void(0)" data-target="#notes">
                    <i class="tim-icons icon-align-center" ></i>
                    <span class="nav-link-text" >Grades</span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse" id="notes">
                    <ul class="nav pl-4">
                        <li>
                            <a href="{{ route('resultat',auth()->user()->id)  }}">
                                <i class="tim-icons icon-bullet-list-67"></i>
                                <p>List</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
           
            <li>
                <a href="{{ route('profile.edit')  }}">
                    <i class="tim-icons icon-settings-gear-63"></i>
                    <p>{{ __('User Profile') }}</p>
                </a>
            </li>
        </ul>
    </div>
</div>
