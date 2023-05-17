@section('programCreateModal')
<div class="modal fade" id="program-create-modal" tabindex="-1" role="dialog" aria-labelledby="programCreateModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title pull-left">
                    Programos pridėjimas
                </h3>
            </div>
            <div class="modal-body">
                <form action="{{route('epasirasymas.settings.magistrai.program_create')}}" id="program-create-form" method="POST">
                    {{csrf_field()}}
                    <div class="row mb-4">
                        <div class="col">
                            <label for="program-pkods"> Unikalus kodas </label>
                            <input type="text" class="form-control disabled" id="program-pkods" name="pkods" placeholder="Unikalus kodas" readonly>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col">
                            <label for="program-name"> Pavadinimas </label>
                            <input type="text" class="form-control" id="program-name" name="name" placeholder="Programos pavadinimas">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col">
                            <label for="minimal-quota-quota"> Minimali kvota </label>
                            <input type="text" class="form-control" id="minimal-quota" name="minimal-quota" value="0">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col">
                            <label for="paid-quota"> VF kvota </label>
                            <input type="text" class="form-control" id="paid-quota" name="paid-quota" value="0">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col">
                            <label for="unpaid-quota"> VNF kvota </label>
                            <input type="text" class="form-control" id="unpaid-quota" name="unpaid-quota" value="0">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col">
                            <label for="program-code"> Valstybinis kodas </label>
                            <input type="text" class="form-control" id="program-code" name="code" placeholder="Valstybinis kodas">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col">
                            <label for="program-price"> Programos kaina </label>
                            <input type="text" class="form-control" id="program-price" name="price" value="0" placeholder="Programos kaina">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col">
                            <label for="program-stage"> Programos etapas </label>
                            <select name="stage" class="form-control">
                                <option value=""> Visi etapai </option>
                                <option value="1"> 1 </option>
                                <option value="2"> 2 </option>
                                <option value="3"> 3 </option>
                            </select>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <button type="submit" class="btn btn-dark"> Pridėti </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
