@foreach($programs as $program)
    <option value="{{$program->pnosauk}}"> {{$program->pnosauk}} /  {{$program->tipsLimenis->tnosauk}}  / {{$program->tipsNodala->tnosauk}} </option>
@endforeach
