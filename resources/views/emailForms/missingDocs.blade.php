<div class="container">
    <form action="{{route('epasirasymas.emails.sendMail')}}" method="post">
        {{csrf_field()}}
        <div class="row">
            <div class="col-md-12">
                <label> Gavėjas </label>
                <input type="text" id="mail_recipient" class="form-control" name="recipient" value="{{$email}}" placeholder="email@domain.com">
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <label> Tema </label>
                <input type="text" id="mail_subject" value="Magistrų priėmimas - trūkstami failai" class="form-control" name="subject">
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <label> Tekstas </label>
                <textarea type="text" id="mail_body" class="form-control" rows="10" name="content">Prašome pridėti trūkstamus failus:
                </textarea>
            </div>
        </div>
        <br>
        <div class="row justify-content-md-center">
            <div class="col text-center">
                <button type="submit" class="btn btn-dark send-btn"> Siųsti </button>
            </div>
        </div>
    </form>
</div>