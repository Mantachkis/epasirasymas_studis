
<div class="col-md-2 mb-2 field-block" data-block-num="{{$blockNum}}">
    <div class="card">
        <ul class="list-group list-group-flush">
            <li class="list-group-item">
                <select class="form-control source-type-select" name="block_{{$blockNum}}[]">
                    <option selected disabled> Laukelio tipas </option>
                    <option value="t"> Tekstinis </option>
                    <option value="c"> Kelių pasirinkimų </option>
                    <option value="f"> Funkcionalumas </option>
                </select>
            </li>
            <li class="list-group-item">
                <select class="form-control field-select" name="block_{{$blockNum}}[]">
                </select>

            </li>
            <li class="list-group-item" >
                <input type="text" class="form-control field-name" placeholder="Pavadinimas" name="block_{{$blockNum}}[]">
            </li>
            <li class="list-group-item add-function-btn-list">
                <button type="button" class="btn btn-dark add-function-btn" style="display:none"> Pridėti f-ja </button>
                <button type="button" class="btn btn-dark remove-block-btn"> Ištrinti lauką </button>
            </li>
        </ul>
    </div>
</div>
