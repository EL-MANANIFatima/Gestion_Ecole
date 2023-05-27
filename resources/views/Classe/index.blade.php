@extends('layouts.app')
@section('title')
{{ trans('trans.title_page') }}
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
      <a href="{{route('Classe.create','test')}}" class="btn btn-fill btn-primary" role="button" aria-pressed="true">
        Add New
      </a>
      <br><br>
      
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
              OP
            </th>
          </thead>
          <tbody>
          @forelse ($det ?? $Classes as $i => $Classe)
            <tr>
              <?php $i++; ?>
              <td style="text-align: center">{{$i}}</td>
              <td style="text-align: center">{{ $Classe->Nom }}</td>
              <td style="text-align: center">{{ $Classe->Niveau->Nom }}</td>
              <td style="text-align: center">
                <a href="{{route('Classe.edit',$Classe->id)}}" role="button" aria-pressed="true"><i
                    class="fa fa-edit"></i></a>
                <a href="{{route('Classe.show',$Classe->id)}}" role="button" aria-pressed="true"><i
                    class="fa fa-trash"></i></a>
                <a href="{{route('AdminEleves',$Classe->id)}}" role="button" aria-pressed="true"><i
                    class="fa fa-list"></i></a>
              </td>

            </tr>
            @empty
    <tr>
      <td colspan="4" style="text-align: center">No classes found.</td>
    </tr>
  @endforelse
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
<script>
  function filter(gradeId) {
    $.ajax({
      url: "{{ route('filter') }}",

      method: 'GET',
      headers: {
        'X-CSRF-TOKEN': '{{ csrf_token()}}'
      },
      data: {
        key: gradeId
      },
      success: function (response) {
        console.log("sucees");
      },
      error: function (xhr) {
        console.log(xhr.responseText);
      }
    });
  }
</script>