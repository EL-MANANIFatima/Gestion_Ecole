@extends('layouts.app')
@section('css')
    @toastr_css
@section('title')
Edit 
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
Edit 
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
                            <form action="{{route('Respo.update','test')}}" method="post">
                             {{method_field('patch')}}
                             @csrf
                            <div class="form-row">
                            <div class="col-md-6">
                        <label for="title">Email</label>
                        <input type="hidden" value="{{$Respo->id}}" name="id">
                        <input type="email" name="Email" value="{{$Respo->email}}" class="form-control">
                        @error('Email')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                            </div>
                    <div class="col-md-6">
                        <label for="title">Password</label>
                        <input type="password" name="Password"  value="{{$Respo->password}}"  class="form-control" >
                        @error('Password')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    </div>
                

                <div class="form-row">
                    <div class="col">
                        <label for="title">First Name</label>
                        <input type="text" name="FName" value="{{ $Respo->Prenom }}" class="form-control" >
                        @error('FName')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="title">Last Name</label>
                        <input type="text" name="LName"  value="{{ $Respo->Nom }}"class="form-control" >
                        @error('LName')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-5">
                        <label for="title">Job</label>
                        <input type="text" name="job" value="{{ $Respo->Fonction}}" class="form-control">
                        @error('job')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3">
                        <label for="title">JC</label>
                        <input type="text" name="JC" class="form-control" value="{{ $Respo->JC}}">
                        @error('JC')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="title">Phone number</label>
                        <input type="text" name="Telephone" class="form-control" value="{{ $Respo->Telephone}}" >
                        @error('Telephone')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>    
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Address</label>
                    <textarea class="form-control" name="Address" id="exampleFormControlTextarea1" rows="1">{{ $Respo->Adresse}}</textarea>
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