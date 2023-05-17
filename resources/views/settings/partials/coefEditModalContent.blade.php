<div class="modal-header">
    <h3 class="modal-title pull-left">
        Programos: {{$program->first()->sp_progr_pavad}} valst. kodu: {{$program->first()->sp_valst_kodas}} redagavimas
    </h3>
</div>
<div class="modal-body">
    <form action="{{route('epasirasymas.settings.magistrai.coeficient_update', ['state_code' => $program->first()->sp_valst_kodas, 'year' => $year,'pkods'=>$program->first()->sp_progr_id])}}" id="agree-send-form">
        @for($i = 0; $i < 5; $i++)
            <div class="row mb-4">
                <div class="col-md-10">
                    <label> Koeficiento pav. </label>
                    <select class="form-control coef-name" name="coef[]">
                        <option> </option>

                        @foreach($coefList as $coef)

                                @if(isset($program->first()->masterSubjectCoef[$i]) && $coef->id == $program->first()->masterSubjectCoef[$i]->mark_code)
                                    <option value="{{$coef->id}}" selected> {{$coef->description_lt}} </option>
                                @else
                                    <option value="{{$coef->id}}"> {{$coef->description_lt}} </option>
                                @endif

                        @endforeach
                    </select>
                </div>
                <div class="col-md-2">
                    <label> Koeficientas </label>
                    <input type="text" class="form-control coef-num" name="coef-sum[]"
                     @if(isset($program->first()->masterSubjectCoef[$i]))
                         value="{{number_format($program->first()->masterSubjectCoef[$i]->coef, 3, ',', null)}}"
                     @endif>
                </div>
            </div>
        @endfor
        <div class="row justify-content-md-center">
            <div class="col text-center">
                <button type="submit" class="btn btn-dark"> Atnaujinti </button>
            </div>
        </div>
    </form>
</div>
