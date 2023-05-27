@extends('layouts.app')  
@section('title')
Parents 
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
Parents 
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
            <a href="{{route('Respo.create','test')}}" class="btn btn-fill btn-primary" role="button" aria-pressed="true">
              New Parent          
            </a> 
            <br><br>
            <div class="table-responsive">
              <table class="table"  border="1px">
                <thead class=" text-primary">
                  <th  style="text-align: center">
                    #
                  </th>
                  <th  style="text-align: center">
                    Full Name
                  </th>
                  <th  style="text-align: center">
                   Email
                  </th>
                  <th  style="text-align: center">
                   JC
                  </th>
                  <th  style="text-align: center">
                   Phone number
                  </th>
                  <th  style="text-align: center">
                  OP
                  </th>
                </thead>
                <tbody>
                <?php $i = 0; ?>
                        @foreach ($Respos as $Respo)
                        <tr >
                            <?php $i++; ?>
                            <td  style="text-align: center" >{{$i}}</td>
                            <td  style="text-align: center" >{{ $Respo->Nom . ' ' . $Respo->Prenom }}</td>
                            <td  style="text-align: center" >{{ $Respo->email }}</td>
                            <td  style="text-align: center" >{{ $Respo->JC }}</td>
                            <td  style="text-align: center" >{{ $Respo->Telephone }}</td>
                            <td style="text-align: center" >
                                <a href="{{route('Respo.edit',$Respo->id)}}"  role="button" aria-pressed="true"><i class="fa fa-edit"></i></a>
                                <a href="{{route('Respo.show',$Respo->id)}}"  role="button" aria-pressed="true"><i class="fa fa-trash"></i></a>
                                <a href="{{route('Respo.info',$Respo->id)}}"   role="button" aria-pressed="true"><i class="fa fa-info"></i></a>

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
