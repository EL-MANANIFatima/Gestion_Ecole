@extends('layouts.app', ['pageSlug' => 'dashboard'])

@section('content')
<div class="row">
    <div class="col-12">
        @livewire('eleve-calendar')
    </div>
</div>
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
                    <div class="table-full-width table-responsive">
                        <table class="table">
                        @php
                      $tasks = App\Models\Task::where('type',3)->where('owner',auth()->user()->id)->get();
                   @endphp
                        <tbody>
                        @foreach ($tasks as $task)

                                <tr id="task_{{ $task->id }}">
                                    <td>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    onclick="deleteTask(<?php echo $task->id; ?>)">
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
                        <table class="table" border="1px">
                            <thead class=" text-primary">
                                <tr>
                                    <th style="text-align: center">
                                        #
                                    </th>
                                    <th style="text-align: center">
                                        Subject
                                    </th>
                                    <th style="text-align: center">
                                        Score
                                    </th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php $i = 1; ?>
                                @foreach(App\Models\Note::where('Eleve_id',
                                auth()->user()->id)->latest()->take(7)->get() as $latestNote)
                                <tr>
                                    <td style="text-align: center">{{ $i++ }}</td>
                                    <td style="text-align: center">
                                        {{$latestNote->Matiere->libelle}}
                                    </td>
                                    <td style="text-align: center">
                                        {{$latestNote->score}}
                                    </td>
                                </tr>
                                @endforeach
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
                headers: {
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