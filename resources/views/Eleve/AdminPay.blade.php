@extends('layouts.app')
@section('css')
    @toastr_css
@section('title')
    {{trans('main_trans.List_Teachers')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    {{trans('main_trans.List_Teachers')}}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="col-xl-12 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Montant</th>
                                            <th>Paye</th>
                                            <th>resant</th>
                                            <th>op</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                            <td></td>
                                            <td>{{$bxh7al}}</td>
                                            <td>{{$paye}}</td>
                                            <td>{{$rest}}</td>
                                            <td>
                                                <input type="hidden" name="Eleve_id" value="{{$Eleve_id}}">
                                                @if($rest == 0)
                                                   <i class="fa fa-check"></i>
                                                @else
                                                <i class="fa fa-spinner"></i>                                              
                                                @endif            
                                            </td>
                                            </tr>
                                    </table>
                                </div>
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