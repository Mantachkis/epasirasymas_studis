<option selected disabled> Laukelio identifikatorius </option>
@foreach($tableFunctions['data'] as $tableFunc)
    <option value="{{$tableFunc['source']}}"> {{$tableFunc['name']}} </option>
@endforeach
