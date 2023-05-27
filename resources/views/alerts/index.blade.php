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
      <br><br>
      
      <br>
      <div class="table-responsive" style="height: 400px; overflow-y: scroll;">
        <table class="table" border="1px">
          <thead class=" text-primary">
            <th style="text-align: center">
              #
            </th>
            <th style="text-align: center">
              Name
            </th>
            <th style="text-align: center">
              Email
            </th>
            <th style="text-align: center">
              Telephone
            </th>
            <th style="text-align: center">
              Message
            </th>
          </thead>
          <tbody>
          
            <?php $i = 0; ?>
            @foreach ($comments as $c)
            <tr >
              <?php $i++; ?>
              <input type="hidden" value="$c->id">
              <td style="text-align: center">{{$i}}</td>
              <td style="text-align: center">{{$c->name}}</td>
              <td style="text-align: center">{{$c->email}}</td>
              <td style="text-align: center">{{$c->phone}}</td>
              <td style="text-align: center">{{$c->message}}</td>
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