@extends('layouts.app')
@section('css')

@section('title')
Tasks
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
Task
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

            <div>
                <div>
                    <div class="card">
                        <div class="card-header">
                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                                New Task
                            </h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('Task.store') }}" method="POST">
                                @csrf
                                <div class="form-row mb-30">
                                    <div class="col">
                                        <label for="title">Title</label>
                                        <input type="text" name="title" class="form-control">
                                    </div>
                                    <div class="col">
                                        <label for="date">Date due</label>
                                        <input class="form-control" type="date" id="datepicker-action" name="date"
                                            data-date-format="dd/mm/">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="desc">Description</label>
                                    <textarea class="form-control" name="desc" rows="2"></textarea>
                                </div>
                                <div class="form-group">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </form>
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