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
                <thead class=" text-primary" >
                  <th  style="text-align: center">
                    #
                  </th>
                      @for ($i = 1; $i <= 5 ; $i++)
                  <th  style="text-align: center">
                      Note {{ $i }}
                  </th>
                  @endfor
                  <th  style="text-align: center">
                        Coeficient
                  </th>
                </thead>
                <tbody>
                    <?php $j=0; ?>
                       @foreach($data as $matiere => $notes)
                        <tr >
                        <td style="text-align: center">{{ $matieres[$j]->libelle }}</td>
                        @for ($i = 0; $i <= 4 ; $i++)
                        <td style="text-align: center">
                           @if(isset($notes[$i]))
                            {{ $notes[$i ]->score }} 
                           @endif
                        </td>
                        @endfor
                        <td style="text-align: center">{{$matieres[$j++]->coef}}</td>
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
