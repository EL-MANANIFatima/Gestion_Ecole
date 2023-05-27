@extends('layouts.app')
@section('css')
    @toastr_css
@section('title')
  تعديل سند قبض
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

                    <form action="{{route('Facture.update','error')}}" method="post" autocomplete="off">
                        @method('PUT')
                        @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>المبلغ : <span class="text-danger">*</span></label>
                                        <input  class="form-control" name="ch7al" value="{{$fact->ch7al}}" type="number" >
                                        <input  type="hidden" name="eleve_id" value="{{$fact->dyalMen->id}}" class="form-control">
                                        <input  type="hidden" name="id"  value="{{$fact->id}}" class="form-control">
                                    </div>
                                </div>
                            </div>

                          

                            <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">{{trans('Students_trans.submit')}}</button>
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
