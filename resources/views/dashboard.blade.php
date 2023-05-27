@extends('layouts.app', ['pageSlug' => 'dashboard'])

@section('content')
<div class="container" style="height: 500px; overflow: auto;">
<div class="row">
    <div class="col-lg-6 col-md-12">
        <div class="card card-tasks">
            <div class="card-header ">
                <h6 class="title d-inline">Tasks</h6>
                <div class="dropdown">
                    <button type="button" class="btn btn-link dropdown-toggle btn-icon" data-toggle="dropdown">
                        <i class="tim-icons icon-settings-gear-63"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="{{route('Task.create')}}">New Task</a>
                    </div>
                </div>
            </div>
            <div class="card-body ">
                <div class="table-responsive">
                    <table class="table tablesorter">
                    @php
                      $tasks = App\Models\Task::where('type',1)->where('owner',auth()->user()->id)->get();
                   @endphp
                        <tbody>
                        @foreach ($tasks as $task)

                            <tr id="task_{{ $task->id }}">
                                <td>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" value="" onclick="deleteTask(<?php echo $task->id; ?>)">
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                </td>
                                <td>
                                    <p class="title">{{$task->title}}-{{$task->due}}</p>
                                    <p class="text-muted">{{$task->desc}}</p>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
        <div class="col-lg-6 col-md-12">
            <div class="card ">
                <div class="card-header">
                    <h4 class="card-title">Latest</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table tablesorter" id="">
                            <thead class=" text-primary">
                                <tr>
                                    <th class="text-center">
                                        ID
                                    </th>
                                    <th class="text-center">
                                        Name
                                    </th>
                                    <th class="text-center">
                                        Amout
                                    </th>
                                    <th class="text-center">
                                        Date
                                    </th>
                                </tr>
                            </thead>
                            @foreach(\App\Models\Facture::latest()->take(7)->get() as $fact)
                            <tbody>

                                <tr>
                                    <td class="text-center" > 
                                        {{$fact->dyalMen->id}}
                                    </td>
                                    <td class="text-center">
                                    {{$fact->dyalMen->Nom}} {{$fact->dyalMen->Prenom }}
                                    </td>
                                    <td class="text-center">
                                    {{$fact->ch7al}}DH
                                    </td>
                                    <td class="text-center">
                                    {{$fact->date_fact}}
                                    </td>
                                </tr>
                            </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<div class="row">
        <div class="col-lg-6">
        <div class="card ">
                <div class="card-header">
                    <h5 class="card-category">Total Student</h5>
                    <h3 class="card-title"><i class="fas fa-user-graduate highlight-icon"></i>{{App\Models\Eleve::count()}}</h3>
                </div>
                <div class="card-body">
                <div class="table-responsive">
                        <table class="table tablesorter" id="">
                            <thead class=" text-primary">
                                <tr>
                                    <th class="text-center">
                                        #
                                    </th>
                                    <th class="text-center">
                                        Female
                                    </th>
                                    <th class="text-center">
                                        Male
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $niveaux = \App\Models\Niveau::all();
                             ?>
                            @foreach($niveaux as $niveau) 
                                 <tr>
                                    <?php 
                                    $femaleCount = App\Models\Eleve::where('Niv_id', $niveau->id)
                                    ->where('Genre_id', 2)
                                    ->count();
                                    $maleCount =  App\Models\Eleve::where('Niv_id', $niveau->id)
                                    ->where('Genre_id', 1)
                                    ->count(); 
                                    ?>
                                    <td class="text-center" > 
                                        {{$niveau->Nom}}
                                    </td>
                                    <td class="text-center">
                                       {{$femaleCount}}
                                    </td>
                                    <td class="text-center">
                                      {{$maleCount}}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                           
                        </table>
                    </div>
                    </div>
            </div>
        </div>
        <div class="col-lg-6">
        <div class="card ">
                <div class="card-header">
                    <h5 class="card-category">Total Teachers</h5>
                    <h3 class="card-title"><i class="fas fa-user-graduate highlight-icon"></i>{{App\Models\Prof::count()}}</h3>
                </div>
                <div class="card-body">
                <div class="table-responsive" >
                        <table class="table tablesorter" id="">
                            <thead class=" text-primary">
                                <tr>
                                   
                                    <th class="text-center">
                                        Female
                                    </th>
                                    <th class="text-center">
                                        Male
                                    </th>
                                </tr>
                            </thead>
                            <tbody>

                                 <tr>
                                    <?php 
                                    $femaleCount = App\Models\Prof::where('Genre_id', 2)
                                    ->count();
                                    $maleCount =  App\Models\Prof::where('Genre_id', 1)
                                    ->count(); 
                                    ?>
                                    
                                    <td class="text-center">
                                       {{$femaleCount}}
                                    </td>
                                    <td class="text-center">
                                      {{$maleCount}}
                                    </td>
                                </tr>
                            </tbody>
                           
                        </table>
                    </div>
                    </div>
            </div>
        </div>
       
    </div>
</div>

    @livewireScripts
    @stack('scripts')
    
    
@endsection
<script>
    function deleteTask(taskId) {
        if (confirm('Are you sure you want to delete this task?')) {
            $.ajax({
                url: "{{ route('task') }}",

                method: 'POST',
                headers:{
                    'X-CSRF-TOKEN': '{{ csrf_token()}}'
                },
                data: {
                    key: taskId
                },
                success: function (response) {
                    $('#task_' + taskId).remove();

                },
                error: function (xhr) {
                    console.log(xhr.responseText);
                }
            });
        }
    }
</script>
