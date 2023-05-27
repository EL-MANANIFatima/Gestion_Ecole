@extends('layouts.app')
@section('css')
  
@section('title')
Title
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
Exams
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
                    New Quizz
                </h5>
            </div>
            <div class="card-body">

                <form class=" row mb-30" action="{{ route('Controle.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        
                                
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="Name"
                                                class="mr-sm-2">Tilte
                                                :</label>
                                            <input class="form-control" type="text" name="title" />
                                        </div>
                                        <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="Classroom_id">Class: <span class="text-danger"></span></label>
                                            <select class="custom-select mr-sm-2" name="Classe_id">
                                            <option selected disabled>Select...</option>
                                                @foreach ($classes as $classe)
                                                     <option value="{{ $classe->id }}">{{ $classe->Nom }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                          <label for="type"
                                                class="mr-sm-2">Type
                                                :</label>
                                            <input placeholder="1 for online , 0 for in person" class="form-control" type="text" name="type" />

                                    </div>
                                    </div>

                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Date</label>
                                            <input class="form-control" type="date" id="datepicker-action"
                                                name="date_cnt" data-date-format="dd/mm/">
                                        </div>
                                    </div>
                                
                           

                            <div class="card-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-dismiss="modal">Cancel</button>
                                <button type="submit"
                                    class="btn btn-success">Submit</button>
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