@extends('layouts.app')
@section('css')
@toastr_css
@section('title')
Select a date
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')

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

                <form action="{{route('Allah')}}">

                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="abs_date">Select a date</label>
                                <input class="form-control" type="date" id="datepicker-action" name="abs_date"
                                    data-date-format="dd/mm/">
                                <input type="hidden" name="Classe_id" value="{{$Classe_id}}" class="form-control">
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-success" type="submit">Send</button>
                </form>

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