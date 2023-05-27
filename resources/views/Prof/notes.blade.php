@extends('layouts.app')  
@section('title')
    {{ trans('trans.title_page') }}
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
{{ trans('trans.Grades') }}
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
                  titre
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
                            <td  style="text-align: center" >{{$exam->nom}}</td>
                           
                            <td style="text-align: center" >
                              @if(App\Models\Note::where('exam_id', $exam->id)->where('Eleve_id', $id))
                                     {{App\Models\Note::where('exam_id', $exam->id)->where('Eleve_id', $id)->first()->score}}
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
