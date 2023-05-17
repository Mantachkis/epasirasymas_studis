@if(!empty($items))
    @foreach ($items as $item)
        @if($item->vdu_pkods != '')
            @if ($item->lama_kodas != '')
                <option value="{{$item->lama_kodas}}">{{$item->luadmProgrammaPkods->pnosauk}}</option>
            @else
                <option value="{{$item->vdu_pkods}}">{{$item->luadmProgrammaPkods->pnosauk}}</option>
            @endif
        @endif
    @endforeach
@else
    <option value=""></option>
@endif