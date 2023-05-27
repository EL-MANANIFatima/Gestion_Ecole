@extends('layouts.app')
@section('css')
@section('title')
{{ trans('Teacher_trans.Add_Teacher') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
Adding a new student
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
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
                <div class="col-xs-12">
                    <div class="col-md-12">
                        <br>
                        <form action="{{route('Eleve.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="col">
                                    <label for="title">Email</label>
                                    <input type="email" name="email" class="form-control">
                                    @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="title">Password</label>
                                    <input type="password" name="password" class="form-control">
                                    @error('password')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <br>


                            <div class="form-row">
                                <div class="col-sm-6">
                                    <label for="title">Lasr Name</label>
                                    <input type="text" name="LName" class="form-control">
                                    @error('LName')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-sm-6">
                                    <label for="title">First Name </label>
                                    <input type="text" name="FName" class="form-control">
                                    @error('FName')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="gender">Gender : <span
                                                    class="text-danger"></span></label>
                                            <select class="custom-select mr-sm-2" name="genre_id">
                                                <option selected disabled>select...</option>
                                                @foreach($Genres as $genre)
                                                <option value="{{ $genre->id }}">{{ $genre->libelle }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Birth Date:</label>
                                            <input class="form-control" type="date" id="datepicker-action"
                                                name="Date_Naiss" data-date-format="dd/mm/">
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="Grade_id">Grade : <span
                                                    class="text-danger"></span></label>
                                            <select class="custom-select mr-sm-2" name="Niv_id">
                                                <option selected disabled>Select...</option>
                                                @foreach($Niveaux as $niv)
                                                <option value="{{ $niv->id }}">{{ $niv->Nom }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="Classroom_id">Class : <span
                                                    class="text-danger"></span></label>
                                            <select class="custom-select mr-sm-2" name="Classe_id">
                                                <option selected disabled>Select...</option>
                                                @foreach($Classes as $classe)
                                                <option value="{{ $classe->id }}">{{ $classe->Nom }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="parent_id">Parent: <span
                                                    class="text-danger"></span></label>
                                            <select class="custom-select mr-sm-2" name="Respo_id">
                                                <option selected disabled>Select...</option>
                                                @foreach($Respos as $respo)
                                                <option value="{{ $respo->id }}">{{ $respo->Nom }} {{ $respo->Prenom }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div><br>
                                <br>


                                <label for="pic" >Files</label>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="pic"> Click here ra matayban walo</label>
                                        <input class="form-control" type="file" accept="image/*"  name="pic">
                                    </div>
                                </div>


                                <button class="btn btn-success btn-sm nextBtn btn-lg pull-right"
                                    type="submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')
@toastr_render
<script>
    $(document).ready(function () {
        $('select[name="Niv_id"]').on('change', function () {
            var Niv_id = $(this).val();
            if (Niv_id) {
                $.ajax({
                    url: "{{ URL::to('Classes') }}/" + Niv_id,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        console.log('gfhg');
                        $('select[name="Classe_id"]').empty();
                        $.each(data, function (key, value) {
                            $('select[name="Classe_id"]').append('<option selected disabled >fffff...</option>');
                            $('select[name="Classe_id"]').append('<option value="' + key + '">' + value + '</option>');
                        });

                    },
                });
            }

            else {
                console.log('AJAX load did not work');
            }
        });
    });
</script>
<script src="{{ asset('js/app.js') }}"></script>
@endsection