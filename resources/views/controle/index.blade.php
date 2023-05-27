@extends('layouts.app')  
@section('title')
Exams 
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
Exams
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
            <a href="{{route('Controle.create','test')}}" class="btn btn-fill btn-primary" role="button" aria-pressed="true">
             Add new
            </a> 
            <br><br>
            <div class="table-responsive">
              <table class="table"  border="1px">
                <thead class=" text-primary">
                  <th  style="text-align: center">
                    #
                  </th>
                  <th  style="text-align: center">
                   Title
                  </th>
                  <th  style="text-align: center">
                  Grade
                  </th>
                  <th  style="text-align: center">
                  Class
                  </th>
                  <th  style="text-align: center">
                  OP
                  </th>
                </thead>
                <tbody>
                <?php $i = 0; ?>
                        @foreach ($Cntr as $Controle)
                        <tr >
                            <?php $i++; ?>
                            @php
                                $controle_id = $Controle->id;
                                $classe_id = $Controle->Classe->id;
                            @endphp
                            <td  style="text-align: center" >{{$i}}</td>
                            <td  style="text-align: center" >{{$Controle->nom}}</td>
                            <td  style="text-align: center" >{{$Controle->Niv->Nom}}</td>
                            <td  style="text-align: center" >{{$Controle->Classe->Nom}}</td>
                            @if($Controle->type== 1)
                            <td style="text-align: center" >
                                <a href="{{route('Controle.edit',$Controle->id)}}"  role="button" aria-pressed="true"><i class="fa fa-edit"></i></a>
                                <a href="{{route('Controle.show',$Controle->id)}}"  role="button" aria-pressed="true"><i class="fa fa-trash"></i></a>
                                <a href="{{route('Details',$Controle->id)}}"  role="button" aria-pressed="true"><i class="fa fa-info"></i></a>
                                <a href="{{route('Notes',$Controle->id)}}"  role="button" aria-pressed="true"><i class="fa fa-check"></i></a>
                            @else
                            <td style="text-align: center" >
                              <a href="{{route('examNote',['controle_id' => $controle_id, 'classe_id' => $classe_id])}}"  role="button" aria-pressed="true"><i class="fa fa-list"></i></a>
                            
                            @endif
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
