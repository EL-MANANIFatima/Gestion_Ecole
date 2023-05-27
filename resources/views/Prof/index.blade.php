@extends('layouts.app')
@section('css')
    @toastr_css
@section('title')
Teachers 
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
Teachers@stop
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
                                <a href="{{route('Prof.create')}}" class="btn btn-success btn-sm" role="button"
                                   aria-pressed="true">Add New</a><br><br>
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Full name</th>
                                            <th>Gendre</th>
                                            <th>Email</th>
                                            <th>Specialization</th>
                                            <th>OP</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $i = 0; ?>
                                        @foreach($Profs as $Prof)
                                            <tr>
                                            <?php $i++; ?>
                                            <td>{{ $i }}</td>
                                            <td>{{ $Prof->Nom . ' ' . $Prof->Prenom }}</td>
                                            <td>{{$Prof->est->libelle}}</td>
                                            <td>{{$Prof->email}}</td>
                                            <td>{{$Prof->enseigne->libelle}}</td>
                                                <td>
                                                    <a href="{{route('Prof.edit',$Prof->id)}}" class="btn btn-info btn-sm" role="button" aria-pressed="true"><i class="fa fa-edit"></i></a>
                                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete_Teacher{{ $Prof->id }}" title="{{ trans('Grades_trans.Delete') }}"><i class="fa fa-trash"></i></button>
                                                    <a href="{{route('Prof.info',$Prof->id)}}" class="btn btn-info btn-sm" role="button" aria-pressed="true"><i class="fa fa-info"></i></a>

                                                </td>
                                            </tr>

                                            <div class="modal fade" id="delete_Teacher{{$Prof->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <form action="{{route('Prof.destroy','test')}}" method="post">
                                                        {{method_field('delete')}}
                                                        {{csrf_field()}}
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">Delete</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Are u sure u want to delete this teacher ?</p>
                                                            <input type="hidden" name="id"  value="{{$Prof->id}}">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Cancel</button>
                                                                <button type="submit"
                                                                        class="btn btn-danger">Delete</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        @endforeach
                                    </table>
                                </div>
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