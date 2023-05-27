@extends('layouts.app')
@section('title')
Absence
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
Absence
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
      <form method="POST" action="{{ route('Absence.store') }}">
        @csrf
        <br>
        <div class="table-responsive">
          <table class="table" border="1px">
            <thead class=" text-primary">
              <th style="text-align: center">
                #
              </th>
              <th style="text-align: center">
                Last Name
              </th>
              <th style="text-align: center">
                First Name
              </th>
              <th style="text-align: center">
                OP
              </th>
            </thead>
            <tbody>
              <?php $i = 0; ?>
              @foreach ($eleves as $Eleve)
              <tr>
                <?php $i++; ?>
                <input type="hidden" value="{{$Eleve->id}}">
                <td style="text-align: center">{{$i}}</td>
                <td style="text-align: center">{{$Eleve->Nom}}</td>
                <td style="text-align: center">{{$Eleve->Prenom}}</td>
                <td style="text-align: center">
                  <label class="block text-gray-500 font-semibold sm:border-r sm:pr-4">
                    <input name="abss[{{ $Eleve->id }}]" @foreach( $Eleve->Absence()->where('abs_date',$selected)->get()
                    as $abs)
                    {{$abs->status == 1 ? 'checked' : '' }}
                    @endforeach
                    class="leading-tight" type="radio" value="presence">
                    <span class="text-success">Present</span>
                  </label>
                  <input type="hidden" name="abs_date" value="{{$selected}}" class="form-control">

                  <label class="ml-4 block text-gray-500 font-semibold">
                    <input name="abss[{{ $Eleve->id }}]" @foreach( $Eleve->Absence()->where('abs_date',$selected)->get()
                    as $abs)
                    {{$abs->status == 0 ? 'checked' : '' }}
                    @endforeach
                    class="leading-tight" type="radio" value="absent">
                    <span class="text-danger">Absent</span>
                  </label>

                  <input type="hidden" name="Eleve_id[]" value="{{ $Eleve->id }}">
                  <input type="hidden" name="Niv_id" value="{{ $Eleve->Niv_id }}">
                  <input type="hidden" name="Classe_id" value="{{ $Eleve->Classe_id }}">

                </td>

              </tr>
              @endforeach
            </tbody>
          </table>
          </table>
          <P>
            <button class="btn btn-success" type="submit">Save</button>
          </P>
      </form>
    </div>
  </div>
</div>
@endsection