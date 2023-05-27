@extends('layouts.app', ['page' => __('User Profile'), 'pageSlug' => 'profile'])

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">Details</h5>
                </div>
                    <div class="card-body">
                                <label>Last name</label> <br>
                                <input  class="form-control" type="text" name="name" value="{{ $eleve->Nom}}" >
                                <br>
                                <label>First name</label><br>
                                <input  class="form-control" type="text" name="name" value="{{ $eleve->Prenom}}" >
                                <br>
                                <label>Email</label><br>
                                <input  class="form-control" type="email" name="email" value="{{$eleve->email}}" >
                                <br>
                                <label>Parent</label><br>
                                <input  class="form-control" type="text" name="parent" value="{{$eleve->Respo->Nom.' '.$eleve->Respo->Prenom}}" >
                            <br>
                                <label>Birth Date :</label><br>
                                <input class="form-control" type="text" value="{{$eleve->Date_Naiss}}"
                                        id="datepicker-action" name="Date_Naiss" data-date-format="yyyy-mm-dd">
                            <br>
                                <label>Classe</label><br>
                                <input class="form-control" type="text" value="{{$eleve->classe->Nom}}">
                            <br>
                                <label>Grade</label><br>
                                <input class="form-control" type="text" value="{{$eleve->Niv->Nom}}">


                    </div>
            </div>
        </div>
        <div class="col-md-4" >
            <div class="card card-user">
                <div class="card-body">
                    <p class="card-text">
                        <div class="author">
                            <div class="block block-one"></div>
                            <div class="block block-two"></div>
                            <div class="block block-three"></div>
                            <div class="block block-four"></div>
                            <a href="#">
                                <img class="avatar" src="{{ asset('storage/Pic_Eleves/' . $eleve->id . '.png') }}" alt="">
                                <h5 class="title">{{ $eleve->Nom }}</h5>
                            </a>
                        </div>
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
