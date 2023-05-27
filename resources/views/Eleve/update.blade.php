@extends('layouts.app')
@section('css')
@toastr_css
@section('title')
Edit student
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
Edit student
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
                        <form action="{{route('Eleve.update','error')}}" method="post" enctype="multipart/form-data">
                            {{ method_field('patch') }}
                            @csrf
                            <div class="form-row">
                                <div class="col">
                                    <label for="title">Email</label>
                                    <input type="hidden" value="{{$Eleve->id}}" name="id">
                                    <input type="email" name="Email" value="{{$Eleve->email}}" class="form-control">
                                    @error('Email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="title">Password</label>
                                    <input type="password" name="password" value="{{$Eleve->password}}"
                                        class="form-control">
                                    @error('password')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <br>


                            <div class="form-row">
                               
                                <div class="col">
                                    <label for="title">Last name</label>
                                    <input type="text" name="LName" value="{{ $Eleve->Nom}}"
                                        class="form-control">
                                    @error('Nom')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="title">First name</label>
                                    <input type="text" name="FName"
                                        value="{{ $Eleve->Prenom }}" class="form-control">
                                    @error('Orenom_ar')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="gender">Gender : <span
                                                class="text-danger"></span></label>
                                        <select class="custom-select mr-sm-2" name="genre_id">
                                            <option selected disabled>Select...</option>
                                            @foreach($Genres as $genre)
                                            <option value="{{$genre->id}}" {{$genre->id == $Eleve->Genre_id ? 'selected'
                                                : ""}}>{{ $genre->libelle }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Birth Date :</label>
                                        <input class="form-control" type="text" value="{{$Eleve->Date_Naiss}}"
                                            id="datepicker-action" name="Date_Naiss" data-date-format="yyyy-mm-dd">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="Grade_id">Grade : <span
                                                class="text-danger"></span></label>
                                        <select class="custom-select mr-sm-2" name="Niv_id">
                                            <option selected disabled>Select...</option>
                                            @foreach($Niveaux as $niv)
                                            <option value="{{ $niv->id }}" {{$niv->id == $Eleve->Niv_id ? 'selected' :
                                                ""}}>{{ $niv->Nom }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="Classroom_id">Class : <span
                                                class="text-danger"></span></label>
                                     <select class="custom-select mr-sm-2" name="Classe_id">
                                        <option selected disabled>Select...</option>
                                        @foreach($classes as $c)
                                            <option value="{{$c->id}}"  {{$c->id == $Eleve->Classe_id ? 'selected' :
                                                ""}}>{{$c->Nom}}</option>
                                                @endforeach    
                                        </select>
                                    </div>
                                </div>


                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="parent_id">Parent: <span
                                                class="text-danger"></span></label>
                                        <select class="custom-select mr-sm-2" name="Respo_id">
                                            <option selected disabled>Select...</option>
                                            @foreach($Respos as $respo)
                                            <option value="{{ $respo->id }}" {{ $respo->id == $Eleve->Respo_id ?
                                                'selected' : ""}}>{{ $respo->Nom }} {{ $respo->Prenom }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>


                            </div><br>

                            <button class="btn btn-success btn-sm nextBtn btn-lg pull-right"
                                type="submit">Update</button>
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
@toastr_js
@toastr_render
@endsection