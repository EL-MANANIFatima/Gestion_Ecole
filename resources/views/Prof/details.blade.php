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
                                <input  class="form-control" type="text" name="name" value="{{ $prof->Nom}}" >
                                <br>
                                <label>First name</label><br>
                                <input  class="form-control" type="text" name="name" value="{{ $prof->Prenom}}" >
                                <br>
                                <label>Email</label><br>
                                <input  class="form-control" type="email" name="email" value="{{$prof->email}}" >
                                <br>
                                <label>Telephone</label><br>
                                <input  class="form-control" type="text" name="parent" value="{{$prof->Telephone}}" >
                                <br>
                                <label>Address</label><br>
                                <input  class="form-control" type="text" name="parent" value="{{$prof->Adresse}}" >
                                <br>
                                <label>Salary</label><br>
                                <input class="form-control" type="text" value="{{$prof->salary}}">
                                <br>
                                <label>Specialisation</label><br>
                                <input class="form-control" type="text" value="{{$prof->enseigne->libelle}}">


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
                                <img class="avatar" src="{{ asset('storage/CNE_Prof/' . $prof->id . '.png') }}" alt="">
                                <h5 class="title">{{ $prof->Nom }}</h5>
                            </a>
                        </div>
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
