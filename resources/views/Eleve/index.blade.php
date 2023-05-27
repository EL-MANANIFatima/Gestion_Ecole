@extends('layouts.app')
@section('title')
{{ trans('trans.title_page') }}
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
Students
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<div class="col-xl-12 ">
  <div class="card card-statistics">
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
      <a href="{{route('Eleve.create','test')}}" class="btn btn-fill btn-primary" role="button" aria-pressed="true">
        Add New
      </a>
      <br><br>
      
      <br>
      <div class="table-responsive" style="height: 400px; overflow-y: scroll;">
        <table class="table" border="1px">
          <thead class=" text-primary">
            <th style="text-align: center">
              #
            </th>
            <th style="text-align: center">
              Full name
            </th>
            <th style="text-align: center">
              Email
            </th>
            <th style="text-align: center">
              Gender
            </th>
            <th style="text-align: center">
              Grade
            </th>
            <th style="text-align: center">
              Classe
            </th>
            <th style="text-align: center">
              OP
            </th>
          </thead>
          <tbody>
            @php
            $list = isset($search) ? $search : $Eleves;
            @endphp
            <?php $i = 0; ?>
            @foreach ($list as $Eleve)
            <tr id="studentSection">
              <?php $i++; ?>
              <input type="hidden" value="$Eleve->id">
              <td style="text-align: center">{{$i}}</td>
              <td style="text-align: center">{{$Eleve->Nom}} {{$Eleve->Prenom}}</td>
              <td style="text-align: center">{{$Eleve->email}}</td>
              <td style="text-align: center">{{$Eleve->genre->libelle}}</td>
              <td style="text-align: center">{{$Eleve->Niv->Nom}}</td>
              <td style="text-align: center">{{$Eleve->classe->Nom}}</td>
              <td style="text-align: center">
                <a href="{{route('Eleve.edit',$Eleve->id)}}" role="button" aria-pressed="true"><i
                    class="fa fa-edit"></i></a>
                <a href="{{route('Eleve.show',$Eleve->id)}}" role="button" aria-pressed="true"><i
                    class="fa fa-trash"></i></a>
                <a href="{{route('Eleve.details',$Eleve->id)}}" role="button" aria-pressed="true"><i class="fa fa-info"></i></a>
                <a href="{{ route('Facture.show',$Eleve->id) }}" role="button" aria-pressed="true"><i
                    class="fa fa-money-bill-alt"></i></a>


            </tr>

            @endforeach
          </tbody>
        </table>
        <br><br>
      </div>
    </div>
  </div>
</div>
</div>
@endsection
<script>
  function filter(gradeId) {
    $.ajax({
      url: "{{ route('search') }}",

      method: 'GET',
      headers: {
        'X-CSRF-TOKEN': '{{ csrf_token()}}'
      },
      data: {
        key: gradeId
      },
      success: function (response) {
        console.log(response.data);

        $('#studentSection').html(response);
      },
      error: function (xhr) {
        console.log(xhr.responseText);
      }
    });
  }
</script>