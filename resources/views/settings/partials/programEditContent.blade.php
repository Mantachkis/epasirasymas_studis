<div class="modal-header">
    <h3 class="modal-title pull-left">
        Programos: {{$program->sp_progr_pavad}} redagavimas
    </h3>
</div>
<div class="modal-body">
    <form action="{{route('epasirasymas.settings.magistrai.update', ['pkods' => $program->sp_progr_id])}}" method="POST">
        {{csrf_field()}}
        <input type="text" id="year" name="year" value="{{$year}}" hidden>
        <input type="text" id="stage" name="stage" value="{{$program->sp_etapas}}" hidden>
        <div class="row mb-4">
            <div class="col">
                <label for="program-name"> Programos pavadinimas </label>
                <input type="text" class="form-control" id="program-name" name="name" value="{{$program->sp_progr_pavad}}">
            </div>
        </div>
        <div class="row mb-4">
            <div class="col">
                <label for="paid-quota"> VF kvota </label>
                <input type="text" class="form-control" id="paid-quota" name="paid-quota" value="{{$program->sp_kvota_vf}}">
            </div>
        </div>
        <div class="row mb-4">
            <div class="col">
                <label for="unpaid-quota"> VNF kvota </label>
                <input type="text" class="form-control" id="unpaid-quota" name="unpaid-quota" value="{{$program->sp_kvota_vnf}}">
            </div>
        </div>
        <div class="row mb-4">
            <div class="col">
                <label for="minimal-quota-quota"> Minimali kvota </label>
                <input type="text" class="form-control" id="minimal-quota" name="minimal-quota" value="{{$program->sp_minimali_kvota??0}}">
            </div>
        </div>
        <div class="row mb-4">
            <div class="col">
                <label for="program-code"> Valstybinis kodas </label>
                <input type="text" class="form-control" id="program-code" name="code" value="{{$program->sp_valst_kodas}}">
            </div>
        </div>
        <div class="row mb-4">
            <div class="col">
                <label for="program-price"> Programos kaina </label>
                <input type="text" class="form-control" id="program-price" name="price" value="{{$program->sp_kaina}}">
            </div>
        </div>
        <div class="row mb-4">
            @if($active == 1) 
            <div class="col-4">
                <label class="form-check-label pr-1" for="program-status"> Aktyvi </label>
                <input  type="checkbox" disabled @if(!is_null($program->sp_priemimas)) checked @endif>
                <input type="hidden" class="" id="program-status" name="status" value=" @if(!is_null($program->sp_priemimas)) Y @endif" >
            </div>
            @else 
             <div class="col-4">
                <label class="form-check-label pr-1" for="program-status"> Aktyvi </label>
                <input type="checkbox" class="form-check-input" id="program-status" name="status" value="Y"  @if(!is_null($program->sp_priemimas)) checked @endif>
            </div>
            @endif
            <div class="col-8 text-right">
                <label class="form-check-label pr-1" for="all-stage-check"> Atnaujinti visiems etapams </label>
                <input type="checkbox" class="form-check-input" id="all-stage-check" name="all-stages" value="Y" >
            </div>

                <div class="col-12  mt-2 mb-2">
                    <label class="form-check-label pr-1" for="program-suspended"> Stabdomas priėmimas </label>
                    <input type="checkbox" class="form-check-input" id="program-suspended" name="suspended" value="Y" @if(!is_null($program->sp_stabdomas_priemimas)) checked @endif >
                </div>
        </div>
        <div class="row justify-content-md-center">
            <div class="col text-center">
                <button type="submit" class="btn btn-dark"> Atnaujinti </button>
            </div>
        </div>
    </form>
</div>
<style>
    .form-check-input{
        margin-left:initial;
        margin-top:0.3rem;
    }
</style>
