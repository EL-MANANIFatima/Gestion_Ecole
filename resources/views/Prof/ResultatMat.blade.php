@extends('layouts.app')  
@section('title')
Grades
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
            
            <br><br>
            <form method="POST" action="{{route('Note.update','error')}}">
            {{ method_field('patch') }}

            @csrf
            <div class="table-responsive">
              <table class="table"  border="1px">
                <thead class=" text-primary" >
                  <th  style="text-align: center">
                    #
                  </th>
                      @for ($k = 1; $k <= 5 ; $k++)
                  <th  style="text-align: center">
                      Note {{ $k }}
                  </th>
                  @endfor
                </thead>
                <tbody>
                    <?php $j=0; ?>
                       @foreach($data as $eleve => $notes)
                        <tr>
                        <td style="text-align: center">{{ $eleves[$j]->Nom.' '.$eleves[$j]->Nom}}</td>
                        @for ($i = 0; $i <= 4 ; $i++)
                        <td style="text-align: center">
                          @if(isset($notes[$i]))
                            @if($notes[$i]->Controle->type == 0)
                                <input type="number" name="note[{{ $eleves[$j]->id }}][{{ $notes[$i]->Controle->id }}]" value="{{ $notes[$i]->score }}" min="0" max="20" step="0.25" required>  
                            @else
                             <input type="hidden" name="note[{{ $eleves[$j]->id }}][]" value="{{ $notes[$i]->score }}"  >
                              {{ $notes[$i]->score }}
                            @endif
                          @else
                            <i class="fa fa-spinner" aria-hidden="true"></i> 
                          @endif
                        </td>
                        @endfor
                        </tr>
                        <?php $j++; ?>
                        @endforeach
                </tbody>
              </table>
            </div>
            <button class="btn btn-success" type="submit">Submit</button>
            </form>
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
