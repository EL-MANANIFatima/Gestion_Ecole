@extends('layouts.app')  
@section('title')
Score
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
Score
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<div class="col-xl-12 mb-30">
    <div class="card card-statistics h-100">
        <div class="card-body">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <br><br>
            <div class="table-responsive">
              <table class="table"  border="1px">
                <thead class=" text-primary">
                  <th  style="text-align: center">
                    #
                  </th>
                  <th  style="text-align: center">
                  Teacher
                  </th>
                  <th  style="text-align: center">
                  Subject
                  </th>
                  <th  style="text-align: center">
                  Title
                  </th>
                  <th  style="text-align: center">
                  Score
                  </th>
                </thead>
                <tbody>
                <?php $i = 0; ?>
                        @foreach ($exams as $exam)
                        <tr >
                            <?php $i++; ?>
                            <input type="hidden" value="$exam->id" >
                            <td  style="text-align: center" >{{$i}}</td>
                            <td  style="text-align: center" >{{$exam->prof->Nom}} {{$exam->prof->Prenom}}</td>
                            <td  style="text-align: center" >{{$exam->prof->enseigne->libelle}}</td>
                            <td  style="text-align: center" >{{$exam->nom}}</td>
                           
                            <td style="text-align: center" >
                            <?php 
                              $note = App\Models\Note::where('exam_id', $exam->id)->where('Eleve_id', $id)->latest()->first();
                            ?>
                              @if($note)
                                     {{$note->score}}
                              @else
                              <i class='fa fa-spinner'></i>
                              @endif  


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
</div>
        </div>
    </div>
</div>
@endsection
