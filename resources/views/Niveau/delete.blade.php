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
                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                id="exampleModalLabel">
                                                Delete Grade
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="card-body">
                                            <form action="{{ route('Niveau.destroy', 'test') }}" method="post">
                                                {{ method_field('Delete') }}
                                                @csrf
                                                Are u sure u want to delete this grade?
                                                <input id="id" type="hidden" name="id" class="form-control"
                                                    value="{{ $Niveau->id }}">
                                                <div class="modal-footer">
                                                <a href="{{route('Niveau.index','test')}}" class="btn btn-secondary" role="button" aria-pressed="true">
                                                    Cancel
                                                </a>
                                                    <button type="submit"
                                                        class="btn btn-danger">Delete</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
@endsection
@section('js')
    @toastr_js
    @toastr_render
@endsection