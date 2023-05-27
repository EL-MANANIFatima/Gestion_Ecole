@extends('layouts.app')
@section('css')
    @toastr_css
@section('title')
    {{ trans('Teacher_trans.Edit_Teacher') }}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    {{ trans('Teacher_trans.Edit_Teacher') }}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">

                    @if(session()->has('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>{{ session()->get('error') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
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
                            <form action="{{route('Prof.update','test')}}" method="post">
                             {{method_field('patch')}}
                             @csrf
                            <div class="form-row">
                                <div class="col">
                                    <label for="title">Email</label>
                                    <input type="hidden" value="{{$Prof->id}}" name="id">
                                    <input type="email" name="Email" value="{{$Prof->email}}" class="form-control">
                                    @error('Email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="title">Password</label>
                                    <input type="password" name="Password" value="{{$Prof->password}}" class="form-control">
                                    @error('Password')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <br>


                            <div class="form-row">
                                <div class="col">
                                    <label for="title">First Name</label>
                                    <input type="text" name="FName" value="{{ $Prof->Prenom}}" class="form-control">
                                    @error('FName')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="title">Last Name</label>
                                    <input type="text" name="LName" value="{{ $Prof->Nom}}" class="form-control">
                                    @error('Nom')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                    <div class="row">
                            <div class="col">
                        <label for="title">JC</label>
                        <input type="text" name="JC" class="form-control" value="{{ $Prof->JC}}" >
                        @error('JC')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col">
                        <label for="title">Phone number</label>
                        <input type="text" name="Telephone" class="form-control" value="{{ $Prof->Telephone}}">
                        @error('Telephone')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    </div>
                            <br>
                            <div class="form-row">
                                <div class="form-group col">
                                    <label for="inputCity">Specialization</label>
                                    <select class="custom-select my-1 mr-sm-2" name="Mat_id">
                                        <option value="{{$Prof->Mat_id}}">{{$Prof->enseigne->libelle}}</option>
                                        @foreach($Mats as $mat)
                                            <option value="{{$mat->id}}">{{$mat->libelle}}</option>
                                        @endforeach
                                    </select>
                                    @error('Mat_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col">
                                    <label for="inputState">Gender</label>
                                    <select class="custom-select my-1 mr-sm-2" name="Genre_id">
                                        <option value="{{$Prof->Genre_id}}">{{$Prof->est->libelle}}</option>
                                        @foreach($Genres as $g)
                                            <option value="{{$g->id}}">{{$g->libelle}}</option>
                                        @endforeach
                                    </select>
                                    @error('Genre_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <br>

                            <br>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Address</label>
                                <textarea class="form-control" name="Address"
                                          id="exampleFormControlTextarea1" rows="1">{{ $Prof->Adresse }}</textarea>
                                @error('Address')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">Update</button>
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