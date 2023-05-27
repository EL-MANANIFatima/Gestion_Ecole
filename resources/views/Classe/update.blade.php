@extends('layouts.app')
@section('css')

@section('title')
{{ trans('trans.title_page') }}
@stop
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

            <div>
                <div>
                    <div class="card">
                        <div class="card-header">
                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                                Edit Class
                            </h5>
                        </div>
                        <div class="modal-body">
                            <!-- edit_form -->
                            <form action="{{ route('Classe.update', 'test') }}" method="post">
                                {{ method_field('patch') }}
                                @csrf
                                <div class="row">
                                    <div class="col">
                                        <label for="Name" class="mr-sm-2">Label
                                            :</label>
                                        <input type="text" class="form-control"
                                            value="{{ $Classe->Nom }}" name="Name" required>
                                    </div>
                                </div><br>
                                <input type="hidden" value="{{ $Classe->id }}" name="id">
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Grade
                                        :</label>
                                    <select class="form-control form-control-lg" id="exampleFormControlSelect1"
                                        name="Niveau_id">
                                        <option value="{{ $Classe->Niveau->id }}">
                                            {{ $Classe->Niveau->Nom }}
                                        </option>
                                        @foreach ($Niveaux as $Niveau)
                                        <option value="{{ $Niveau->id }}">
                                            {{ $Niveau->Nom }}
                                        </option>
                                        @endforeach
                                    </select>

                                </div>
                                <div class="col">
                                    <label for="inputName" class="control-label">Teachers

                                    </label>
                                    <select multiple name="Prof_id[]" class="form-control"
                                        id="exampleFormControlSelect2">
                                        @foreach($Profs as $prof)
                                        <option selected value="{{$prof->id}}">{{$prof->Nom}}</option>
                                        @endforeach

                                        @foreach($Profs as $Prof)
                                        <option value="{{$Prof->id}}">{{$Prof->Nom}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <br><br>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                        Cancel
                                    </button>
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
@section('js')
@toastr_js
@toastr_render
@endsection