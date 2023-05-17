@section('invitationModal')
    <div class="container">
        <div class="modal fade" id="agreementSendModal" tabindex="-1" role="dialog"
             aria-labelledby="agreementSendModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title pull-left">
                            Finansavimo keitimas
                        </h3>
                    </div>
                    <div class="modal-body">
                        
                        <form action=" {{route('epasirasymas.magistrai.konkursine_eile.store_uninv_agree')}}" id="agree-send-form" method="POST">
                            {{csrf_field()}}
                            <input type="text" id="master-req-id" name="id" value="" hidden>
                            <div class="row justify-content-md-center mb-4">
                                <div class="col">
                                    <select class="form-control" name="finance-type" id="finance_type">
                                        <option disabled selected value="disabled"> Pasirinkite finansavimą</option>
                                        <option value="VF"> Valstybės finansuojamas</option>
                                        <option value="VNF"> Valstybės nefinansuojamas</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row justify-content-md-center">
                                <div class="col text-center">
                                    <button type="submit" onclick="return validateForm() " class="btn btn-dark"> Keisti
                                        finansavimą
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>

        function validateForm() {
            if (document.getElementById("finance_type").value == "disabled") {
                alert("Pasirinkite finansavimą.");
                return false;
            } else {
                if (confirm('Siųsti kvietimą?')) {
                    return true;
                } else {
                    $('#agreementSendModal').modal('hide');

                    return false;

                }

            }
        }
    </script>
@endsection