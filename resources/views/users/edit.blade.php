<div class="row">
    <div class="col-md-12">
        <div class="alert  alert-danger" style="display:none"></div>
        <div class="alert  alert-success" style="display:none"></div>
@if(!empty($user->id))
<form method="POST" action="{{'epasirasymas.users.usersEditSave'}}" id="userForm">
@csrf
    <input type="hidden" name="id" value="{{$user->id}}">
    <label>Vardas *</label>
    <input type="text" class="form-control" required="" maxlength="100" id="name" name="name" value="{{$user->name}}">
    <label>Pavardė *</label>
    <input type="text" class="form-control" required="" maxlength="100" id="surname" name="surname" value="{{$user->surname}}">
    <label>Asmens kodas *</label>
    <input type="text" class="form-control" required="" maxlength="100" id="pers_code" name="pers_code" value="{{$user->pers_code}}">
    <label>El. paštas *</label>
    <input type="text" class="form-control" required="" maxlength="100" id="email" name="email" value="{{$user->email}}">
    <label>Slaptažodis</label>
    <input type="password" class="form-control" maxlength="100" id="password" name="password" value="">
    <label>Pakartoti slaptažodį</label>
    <input type="password" class="form-control" maxlength="100" id="password_confirmation" name="password_confirmation" value="">
    <hr />
    @if(!empty($user->cilveksPersCode))
        <p><small><b>VDU duomenų bazėje rasta info: {{$user->cilveksPersCode->vards}}
                {{$user->cilveksPersCode->uzvards}}
                {{$user->cilveksPersCode->pers_kods}}
                {{$user->cilveksPersCode->nod_gk_vieta}}
            </b></small></p>
    @elseif(!empty($user->luadmCilveksCkods))
        <p><small><b>{{$user->luadmCilveksCkods->vards}}
                {{$user->luadmCilveksCkods->uzvards}}
                {{$user->luadmCilveksCkods->pers_kods}}
                    {{$user->luadmCilveksCkods->nod_gk_vieta}}</b></small></p>
    @endif
    <p>Jei įvesite slaptažodį, naudotojo slaptažodis bus pakeistas!!!</p>
    <p>* - privalomi laukai</p>
</form>
<hr />
<button type="button" class="btn btn-dark" id="editSave">Saugoti</button>
@else
    <p>Klaida, Naudotojas nerastas!</p>
@endif
    </div>
</div>