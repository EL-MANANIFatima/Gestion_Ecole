@extends('layouts.app')  
@section('title')
Title
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
Questions
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
            <a href="{{route('Question.show',$ID)}}" class="btn btn-fill btn-primary" role="button" aria-pressed="true">
             Add New
            </a> 
            <input type="hidden" value=""
            <br><br>
            <div class="table-responsive">
              <table class="table"  border="1px">
                <thead class=" text-primary">
                  <th  style="text-align: center">
                    #
                  </th>
                  <th  style="text-align: center">
                   Question
                  </th>
                  <th  style="text-align: center">
                   Choices
                  </th>
                  <th  style="text-align: center">
                   Right answer
                  </th>
                  <th  style="text-align: center">
                  score
                  </th>
                  <th  style="text-align: center">
                  OP
                  </th>
                </thead>
                <tbody>
                <?php $i = 0; ?>
                        @foreach ($qsts as $q)
                        <tr >
                            <?php $i++; ?>
                            <input type="hidden" value="{{$ID}}" name="id">
                            <td  style="text-align: center" >{{$i}}</td>
                            <td  style="text-align: center" >{{$q->titre}}</td>
                            <td  style="text-align: center" >{{$q->choix}}</td>
                            <td  style="text-align: center" >{{$q->rep}}</td>
                            <td  style="text-align: center" >{{$q->score}}</td>
                            <td style="text-align: center" >
                                <a href="{{route('Question.edit',$q->id)}}"  role="button" aria-pressed="true"><i class="fa fa-edit"></i></a>
                                <a href="{{route('Question.delete',$q->id)}}"  role="button" aria-pressed="true"><i class="fa fa-trash"></i></a>


                        </tr>
                        
                        @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
        </div>
    </div>
</div>
@endsection
