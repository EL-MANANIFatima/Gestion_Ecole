@extends('layouts.app')  
@section('title')
    {{ trans('trans.title_page') }}
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
    <div class="card-header">
      <b>Notif</b>
    </div>
    <br>
    <div class="card-body">
        @foreach(auth()->user()->unreadnotifications as $notif)
          <div class="bg-blue-300 p3 m2" >
             <b>{{$notif->data['Respo']}}</b> a paye un montant de 
             <b>{{$notif->data['Amount']}}</b> concernat les fees? de
            <b>{{$notif->data['Eleve']}}</b>
            <a href="{{route('mar',$notif->id)}}" class="p-2 bg-red-400 text-white rounded-lg" >Mark as read </a> 
          </div>
          <br>
        @endforeach   
    </div>
  </div>
</div>
      
@endsection
