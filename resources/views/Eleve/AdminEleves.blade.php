@extends('layouts.app')  
@section('title')
    {{ trans('trans.title_page') }}
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
Listes des eleves
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
            <input class="form-control input-sm"  name="LName" onchange="filter(this.value)" required>
            <br>
            <div class="table-responsive">
              <table class="table"  border="1px">
                <thead class=" text-primary">
                  <th  style="text-align: center">
                    #
                  </th>
                  <th  style="text-align: center">
                    Name
                  </th>
                  <th  style="text-align: center">
                  Email
                  </th>
                  <th  style="text-align: center">
                  Gender
                  </th>
                  <th  style="text-align: center">
                  OP
                  </th>
                </thead>
                <tbody>
                <?php $i = 0; ?>
                        @foreach ($eleves as $Eleve)
                        <tr >
                            <?php $i++; ?>
                            <input type="hidden" value="$Eleve->id" >
                            <td  style="text-align: center" >{{$i}}</td>
                            <td  style="text-align: center" >{{$Eleve->Nom}} {{$Eleve->Prenom}}</td>
                            <td  style="text-align: center" >{{$Eleve->email}}</td>
                            <td  style="text-align: center" >{{$Eleve->genre->libelle}}</td>
                            <td style="text-align: center" >
                            <a href="{{ route('Facture.show',$Eleve->id) }}"  role="button" aria-pressed="true"><i class="fa fa-money-bill-alt"></i></a>
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
        console.log(response.classes);
      },
      error: function (xhr) {
        console.log(xhr.responseText);
      }
    });
  }
</script>
