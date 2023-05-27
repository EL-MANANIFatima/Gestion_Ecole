@extends('layouts.app')
@section('css')
  
@section('title')
    {{ trans('trans.title_page') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
{{ trans('trans.Grades') }}
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
                    Add Class
                </h5>
            </div>
            <div class="card-body">

                <form class=" row mb-30" action="{{ route('Classe.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        
                                
                                    <div class="row">

                                        <div class="col">
                                            <label for="Name"
                                                class="mr-sm-2">Label
                                                :</label>
                                            <input class="form-control" type="text" name="Name"  required/>
                                        </div>


                                        <div class="col">
                                            <label for="Niveau_id"
                                                class="mr-sm-2">Grade
                                                :</label>

                                            <div class="col">
                                                <select class="form-control" name="Niveau_id">
                                                    @foreach ($Niveaux as $Niveau)
                                                        <option value="{{ $Niveau->id }}">{{ $Niveau->Nom }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                        </div>
                                    </div>
                                    <div>
                                        <div class="col">
                                            <label for="prof" data-dropdown="true"
                                                class="mr-sm-2">Teachers
                                                :</label>

                                            <div class="box">
                                                <select class="form-control" name="Prof_id[]" multiple>
                                                    @foreach ($Profs as $Prof)
                                                        <option value="{{ $Prof->id }}">{{ $Prof->Nom }} {{ $Prof->Prenom }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

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