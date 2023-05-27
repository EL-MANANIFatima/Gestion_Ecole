@if (auth('web')->check())
    @include('layouts.sidebars.admin_sidebar')
@endif
@if (auth('eleve')->check())
    @include('layouts.sidebars.eleve_sidebar')
@endif

@if (auth('prof')->check())
    @include('layouts.sidebars.prof_sidebar')
@endif

@if (auth('respo')->check())
    @include('layouts.sidebars.respo_sidebar')
@endif
