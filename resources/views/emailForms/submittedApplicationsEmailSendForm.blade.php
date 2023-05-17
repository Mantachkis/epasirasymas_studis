<div class="modal fade" id="mail-modal" tabindex="-1" role="dialog" aria-labelledby="submittedAppMailSendModal" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title pull-left">Siųsti laišką</h3>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="margin-top:5px">&times;</button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <label> Siuntėjas </label>
                            <input type="text" id="mail_sender" class="form-control" value="{{$emailFormData->getSender()}}" placeholder="email@domain.com">
                        </div>
                        <div class="col-md-6">
                            <label> Gavėjas </label>
                            <input type="text" id="mail_recipient" class="form-control" value="" placeholder="email@domain.com">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label> Tema </label>
                            <input type="text" id="mail_subject" value="{{$emailFormData->getSubject()}}" class="form-control">
                        </div>
                    </div>
                    <div class="row pt-3">
                        <div class="col-md-12">
                            <textarea type="text" id="mail_body" class="form-control" rows="20"> {{$emailFormData->getMailTemplate()}} </textarea>
                        </div>
                    </div>
                    <div class="row pt-3 justify-content-center">
                        <button class="btn btn-dark" id="send_btn"> Siųsti </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>

</style>
