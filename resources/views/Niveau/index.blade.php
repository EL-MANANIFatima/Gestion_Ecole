@extends('layouts.app')  
@section('title')
    {{ trans('trans.title_page') }}
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
Grades
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
            <a href="{{route('Niveau.create','test')}}" class="btn btn-fill btn-primary" role="button" aria-pressed="true">
                Add New
            </a> 
            <br><br>
            <div class="table-responsive">
              <table class="table"  border="1px">
                <thead class=" text-primary">
                  <th  style="text-align: center">
                    #
                  </th>
                  <th  style="text-align: center">
                    Label
                  </th>
                  <th  style="text-align: center">
                    Bxh7al               
                  </th>
                  <th  style="text-align: center">
                  OP
                  </th>
                </thead>
                <tbody>
                <?php $i = 0; ?>
                        @foreach ($Niveaux as $Niveau)
                        <tr >
                            <?php $i++; ?>
                            <td  style="text-align: center" >{{$i}}</td>
                            <td  style="text-align: center" >{{ $Niveau->Nom }}</td>
                            <td  style="text-align: center" >{{ number_format($Niveau->bxh7al, 2) }}</td>

                            <td style="text-align: center" >
                                <a href="{{route('Niveau.edit',$Niveau->id)}}" class="btn btn-info btn-sm" role="button" aria-pressed="true"><i class="fa fa-edit"></i></a>
                                <a href="{{route('Niveau.show',$Niveau->id)}}" class="btn btn-warning btn-sm" role="button" aria-pressed="true"><i class="fa fa-trash"></i></a>
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
