@extends('layouts.app')
@section('css')
  
@section('title')
    {{ trans('trans.title_page') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
Grades
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
            
            <div >
    <div >
        <div class="card">
            <div class="card-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                   New Grade
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="card-body">
                <!-- add_form -->
                <form action="{{ route('Niveau.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <label for="Name" class="mr-sm-2">Label
                                :</label>
                            <input id="Name" type="text" name="Name" class="form-control">
                        </div>
                    </div>
                    <div class="form-row">
                    
                    <div class="form-group col">
                        <label for="inputEmail4">Fees</label>
                        <input type="number" value="{{ old('montant') }}" name="bxh7al" class="form-control">
                    </div>

                </div>
            </div>
            <div class="card-footer">
            <a href="{{route('Niveau.index','test')}}" class="btn btn-secondary" role="button" aria-pressed="true">
                Back
            </a>
                <button type="submit" class="btn btn-fill btn-primary">Submit</button>
            </div>
            </form>

        </div>
    </div>
</div>
@endsection
@section('js')
    @toastr_js
    @toastr_render
@endsection