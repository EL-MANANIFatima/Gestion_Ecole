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
                  nom
                  </th>
                  <th  style="text-align: center">
                  Prenom
                  </th>
                  <th  style="text-align: center">
                  score
                  </th>
                  <th  style="text-align: center">
                  date
                  </th>
                </thead>
                <tbody>
                <?php $i = 0; ?>
                        @foreach ($notes as $note)
                        <tr >
                            <?php $i++; ?>
                            <td  style="text-align: center" >{{$i}}</td>
                            <td  style="text-align: center" >{{$note->Eleve->Nom}}</td>
                            <td  style="text-align: center" >{{$note->Eleve->Prenom}}</td>
                            <td  style="text-align: center" >{{$note->score}}</td>
                            <td  style="text-align: center" >{{$note->date}}</td>
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
