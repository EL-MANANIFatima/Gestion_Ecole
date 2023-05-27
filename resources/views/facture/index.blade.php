@extends('layouts.app')  
@section('title')
Fees 
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
Fees 
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
                  dyalmen 
                  </th>
                  <th  style="text-align: center">
                  Amount
                  </th>
                  <th  style="text-align: center">
                  Date
                  </th>
                </thead>
                <tbody>
                <?php $i = 0; ?>
                        @foreach ($Facts as $l)
                        <tr >
                            <?php $i++; ?>
                            <td  style="text-align: center" >{{$i}}</td>
                            <td  style="text-align: center" >{{$l->dyalMen->Nom}} {{$l->dyalMen->Prenom}}</td>
                            <td  style="text-align: center" >{{ number_format($l->ch7al, 2) }}</td>
                            <td style="text-align: center" >{{$l->date_fact}}</td>

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
