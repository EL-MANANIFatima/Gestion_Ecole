@extends('layouts.app')
@section('title')
Classes
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
Classes
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
        <table class="table" border="1px">
          <thead class=" text-primary">
            <th style="text-align: center">
              #
            </th>
            <th style="text-align: center">
               Label
            </th>
            <th style="text-align: center">
             Grade
            </th>
            <th style="text-align: center">
              Total Students
            </th>
            <th style="text-align: center">
              OP
            </th>
          </thead>
          <tbody>
            <?php $i = 0; ?>
            @foreach ($classes as $Classe)
            <tr>
              <?php $i++; ?>
              <td style="text-align: center">{{$i}}</td>
              <td style="text-align: center">{{ $Classe->Nom }}</td>
              <td style="text-align: center">{{ $Classe->Niveau->Nom }}</td>
              <td style="text-align: center">{{ $Classe->eleves->count()}}</td>
              <td style="text-align: center">
                <a href="{{route('MesEleves',$Classe->id)}}" role="button" aria-pressed="true"><i
                    class="fa fa-list"></i></a>
                <a href="{{route('ResultatMat',$Classe->id)}}" role="button" aria-pressed="true"><i
                    class="fa fa-graduation-cap"></i></a>

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
</div>
</div>
</div>
</div>
@endsection