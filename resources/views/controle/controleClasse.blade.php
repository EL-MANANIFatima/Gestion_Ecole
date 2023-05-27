@extends('layouts.app')  
@section('title')
Note
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
Note
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
            <form method="POST" action="{{route('Note.store')}}">
                @csrf
            <div class="table-responsive">
              <table class="table"  border="1px">
                <thead class=" text-primary" >
                  <th  style="text-align: center">
                    #
                  </th>
                  <th  style="text-align: center">
                      Note 
                  </th>
                </thead>
                <tbody>
                    <?php $j=0; ?>
                       @foreach($eleves as $eleve)
                        <tr>
                        <td style="text-align: center">{{ $eleve->Nom.' '.$eleve->Prenom}}</td>
                        <td style="text-align: center">
                        <input type="hidden" name="controle" value="{{$controle}}">
                           @if($note = App\Models\Note::where('Eleve_id',$eleve->id)->where('exam_id',$controle)->first())
                           <input type="number" name="note[{{ $eleves[$j]->id }}]" value="{{ $note->score }}" min="0" max="20" step="0.25" >  
                           @else
                           <input type="number" name="note[{{ $eleves[$j]->id }}]" min="0" max="20" step="0.25" >
                           @endif
                        </td>
                        </tr>
                        <?php $j++; ?>
                        @endforeach
                </tbody>
              </table>
            </div>
            <button class="btn btn-success" type="submit">Save</button>
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