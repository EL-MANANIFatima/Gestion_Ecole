@extends('layouts.app', ['pageSlug' => 'dashboard'])

@section('content')
<div class="container" style="height: 500px; overflow: auto;">
        <div class="col-lg-12 col-md-12">
            <div class="card ">
                <div class="card-header">
                    <h4 class="card-title">Latest</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table"  border="1px">
                            <thead class=" text-primary">
                                <tr>
                                    <th style="text-align: center">
                                        #
                                    </th>
                                    <th style="text-align: center">
                                        Name
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
                            <?php 
                                $fils = App\Models\Eleve::where('Respo_id', auth()->user()->id)->get();
                            ?>
                            @foreach($fils as $eleve)
                            <?php
                                    $latestNote = App\Models\Note::where('Eleve_id', $eleve->id)->latest()->first();
                            ?>
                                @if($latestNote)
                                <tr>
                                <?php $i = 1;  ?>
                                <td  style="text-align: center">{{ $i++ }}</td>
                                    <td  style="text-align: center">
                                    {{$latestNote->Eleve->Prenom}}
                                    </td>
                                    <td  style="text-align: center">
                                    {{$latestNote->Matiere->libelle}}
                                    </td>
                                    <td  style="text-align: center">
                                    {{$latestNote->score}}
                                    </td>
                                </tr>
                                @endif
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    
@endsection

@push('js')
    <script src="{{ asset('black') }}/js/plugins/chartjs.min.js"></script>
    <script>
        $(document).ready(function() {
          demo.initDashboardPageCharts();
        });
    </script>
@endpush

