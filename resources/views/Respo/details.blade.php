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
                                <input  class="form-control" type="text" name="name" value="{{ $respo->Nom}}" >
                                <br>
                                <label>First name</label><br>
                                <input  class="form-control" type="text" name="name" value="{{ $respo->Prenom}}" >
                                <br>
                                <label>Email</label><br>
                                <input  class="form-control" type="email" name="email" value="{{$respo->email}}" >
                                <br>
                                <label>Telephone</label><br>
                                <input  class="form-control" type="text" name="parent" value="{{$respo->Telephone}}" >
                                <br>
                                <label>Address</label><br>
                                <input  class="form-control" type="text" name="parent" value="{{$respo->Adresse}}" >
                                <br>
                                <label>Job</label><br>
                                <input class="form-control" type="text" value="{{$respo->Fonction}}">
                                <br>


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
                                <img class="avatar" src="{{ asset('storage/CNE_Respo/' . $respo->id . '.png') }}" alt="">
                                <h5 class="title">{{ $respo->Nom }}</h5>
                            </a>
                        </div>
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
