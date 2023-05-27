@extends('layouts.app')
@section('css')
@section('title')
Edit
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
Edit
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
                    <div class="col-xs-12">
                        <div class="col-md-12">
                            <br>
                            <form action="{{route('Question.update','error')}}" method="post" >
                            {{ method_field('patch') }} 
                            @csrf
                             <div class="col">
                                  <input type="hidden" value="{{$question->id}}" name="id">
                                    <label for="title">Question</label>
                                    <input type="text" name="qst" value="{{$question->titre}}" class="form-control">
                                    @error('qst')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                            </div>
                            <br>
                            <div class="form-row">
                                <div class="col">
                                    <label for="title">Choices</label>
                                    <textarea  name="choix"  class="form-control" rows="3">{{$question->choix}}</textarea>
                                    @error('choix')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                    <label for="title">Right answer</label>
                                    <input type="text" name="rep" value="{{$question->rep}}" class="form-control">
                                    @error('rep')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                            </div>
                            <div class="col">
                                    <label for="title">{{trans('Students_trans.name_en')}}</label>
                                    <input type="number" name="score" value="{{$question->score}}" class="form-control">
                                    @error('score')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                            </div>
                    <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">Edit</button>
                </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')
    @toastr_render
   
@endsection
