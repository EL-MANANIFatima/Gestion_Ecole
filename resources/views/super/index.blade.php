@extends('layouts.app')
@section('css')
    @toastr_css
@section('title')
Kids
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
Kids
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
                                            <th>Name</th>
                                            <th>Grade</th>
                                            <th>Class</th>
                                            <th>OP</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $i = 0; ?>
                                        @foreach($bb as $b)
                                            <tr>
                                            <?php $i++; ?>
                                            <td>{{ $i }}</td>
                                            <td>{{ $b->Nom . ' ' . $b->Prenom }}</td>
                                            <td>{{$b->Niv->Nom}}</td>
                                            <td>{{$b->classe->Nom}}</td>
                                                <td>
                                                    <a href="{{route('Super.show',$b->id)}}"  role="button" aria-pressed="true"><i class="fa fa-edit"></i></a>                                               
                                                    <a href="{{route('resultat',$b->id)}}"  role="button" aria-pressed="true"><i class="fa fa-graduation-cap"></i></a>   
                                                    <a href="{{route('Super.edit',$b->id)}}"  role="button" aria-pressed="true"><i class="fa fa-times"></i></a>
                                                    <a href="{{route('Super.pay',$b->id)}}"  role="button" aria-pressed="true"><i class="fa fa-money-bill-alt"></i></a>                                               
                                                </td>
                                            </tr>
                                        @endforeach
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