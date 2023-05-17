<option selected disabled> Laukelio identifikatorius </option>
<option value="name"> Vardas </option>
<option value="surname"> Pavardė </option>
<option value="email"> El. paštas </option>
<option value="person_code"> Asmens kodas </option>
@foreach($templateFields as $templField)
    <option value="{{$templField->application_classification_id}}"> {{$templField->classification->text_lt ?? ''}} / {{$templField->classification->text_en ?? ''}} </option>
@endforeach
