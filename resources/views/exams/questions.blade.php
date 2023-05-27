<div>
    <div>
        <div class="card card-statistics mb-30">
            <div class="card-body">
                <h5 class="card-title"> {{$qst[$i]->titre}}</h5>
                @foreach(preg_split('/(-)/', $qst[$i]->choix) as $choice)
                    <div class="custom-control custom-radio">
                        <input type="radio" id="customRadio{{$loop->index}}" name="customRadio" class="custom-control-input" wire:model="selectedChoice" value="{{$choice}}">
                        <label class="custom-control-label" for="customRadio{{$loop->index}}">{{$choice}}</label>
                    </div>
                    <br>
                @endforeach
            </div>
            <div class="card-footer">
                <a class="btn btn-fill btn-primary" wire:click="nextQuestion({{$qst[$i]->id}})">Next</a>
            </div>
        </div>
    </div>
</div>
