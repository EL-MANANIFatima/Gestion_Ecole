@extends('layouts.app')
@section('css')
    @toastr_css
@section('title')
Payment
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
Payment
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
                                            <th>Amount</th>
                                            <th>Paid</th>
                                            <th>Remaining</th>
                                            <th>OP</th>
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
                                                <a href="{{ route('Super.getForm',$Eleve_id) }}"  role="button" aria-pressed="true"><i class="fa fa-credit-card"></i></a>                                               
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