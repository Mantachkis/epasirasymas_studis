@section('coefListing')
<div class="row">
    <div class="card">
        <div class="card-body card-body-low-padding">
            @if(!(empty($coefs)))
                @foreach($coefs as $coef)
                    <p>- {{$coef->classification->description_lt}}  <b>{{'0'.$coef->coef}}</b></p>
                @endforeach

            @endif
        </div>
    </div>
</div>
<style>
    .card-body>p{
        white-space:initial;
    }
</style>

@endsection


