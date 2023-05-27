@extends('layouts.app')
@section('css')
  
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
            <br>
            <form  action="{{ route('Super.store') }}" method="POST">
                @csrf 
                <input type="hidden" name="Eleve_id" value="{{$Eleve_id}}">      
                <div class="form-group col">
                    <label for="inputEmail4">Amount</label>
                    <input type="number" name="xh7al" class="form-control"  required>
                </div>
                <div class="form-group col">
                    <label for="inputEmail4">Card number</label>
                    <input type="text" name="number" class="form-control"  required>
                </div>
                <div class="form-group col">
                    <label for="inputEmail4">Month</label>
                    <input type="text" name="exp_m" class="form-control"  required>
                    <label for="inputEmail4">Year</label>
                    <input type="text" name="exp_y" class="form-control"  required>
                    <label for="inputEmail4">CVV</label>
                    <input type="text" name="cvv" class="form-control"  required>

                </div>
                <br><br>
                <button type="submit" class="btn btn-fill btn-primary">Submit</button>
            </form>

        </div>
    </div>
</div>
@endsection
@section('js')
    @toastr_js
    @toastr_render
@endsection