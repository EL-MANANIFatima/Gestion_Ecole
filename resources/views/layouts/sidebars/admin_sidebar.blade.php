<div class="sidebar"  style="overflow: auto;">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="#" class="simple-text logo-normal">Lachimolala</a>
        </div>
        <ul class="nav">
            <li>
                <a href="{{ route('dashboard') }}">
                    <i class="tim-icons icon-chart-pie-36"></i>
                    <p>{{ __('Dashboard') }}</p>
                </a>
            </li>
            <li>
                <a data-toggle="collapse" href="javascript:void(0)" data-target="#niv">
                    <i class="tim-icons icon-bank" ></i>
                    <span class="nav-link-text" >Grades</span>
                    <b class="caret mt-1"></b>
                </a>
                <div class="collapse" id="niv">
                    <ul class="nav pl-4">
                        <li>
                            <a href="{{ route('Niveau.index')  }}">
                                <i class="tim-icons icon-bullet-list-67"></i>
                                <p>List</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li>
                <a data-toggle="collapse" href="javascript:void(0)" data-target="#classe">
                    <i class="tim-icons icon-laptop" ></i>
                    <span class="nav-link-text" >Classes</span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse" id="classe">
                    <ul class="nav pl-4">
                        <li>
                            <a href="{{ route('Classe.index')  }}">
                                <i class="tim-icons icon-bullet-list-67"></i>
                                <p>List</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li>
                <a data-toggle="collapse" href="javascript:void(0)" data-target="#eleve">
                    <i class="tim-icons icon-single-02" ></i>
                    <span class="nav-link-text" >Students</span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse" id="eleve">
                    <ul class="nav pl-4">
                        <li>
                            <a href="{{ route('Eleve.index')  }}">
                                <i class="tim-icons icon-bullet-list-67"></i>
                                <p>List</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li>
                <a data-toggle="collapse" href="javascript:void(0)" data-target="#prof">
                    <i class="tim-icons icon-atom" ></i>
                    <span class="nav-link-text" >Teachers</span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse" id="prof">
                    <ul class="nav pl-4">
                        <li>
                            <a href="{{ route('Prof.index')  }}">
                                <i class="tim-icons icon-bullet-list-67"></i>
                                <p>List</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li>
                <a data-toggle="collapse"  href="javascript:void(0)" data-target="#respo" >
                    <i class="tim-icons icon-heart-2" ></i>
                    <span class="nav-link-text" >Parents</span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse" id="respo">
                    <ul class="nav pl-4">
                        <li>
                            <a href="{{ route('Respo.index')  }}">
                                <i class="tim-icons icon-bullet-list-67"></i>
                                <p>List</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li>
                <a data-toggle="collapse" href="javascript:void(0)" data-target="#fact">
                    <i class="tim-icons icon-coins" ></i>
                    <span class="nav-link-text" >Fees</span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse" id="fact">
                    <ul class="nav pl-4">
                        <li >
                            <a href="{{ route('Facture.index')  }}">
                                <i class="tim-icons icon-bullet-list-67"></i>
                                <p>List</p>
                            </a>
                        </li>
                    </ul>
            </li>
            <li>
                <a href="{{ route('contact')  }}">
                    <i class="tim-icons icon-settings-gear-63"></i>
                    <p>Avis</p>
                </a>
            </li>
           
        </ul>
    </div>
</div>
