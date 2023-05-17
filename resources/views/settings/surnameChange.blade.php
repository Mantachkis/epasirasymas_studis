@include ('layouts/main')
@yield ('scripts')
@yield ('header')
@yield('js')

{{Breadcrumbs::render()}}

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-bordered table-condensed">
                    <thead>
                    <tr>
                        <th> Vardas </th>
                        <th> Pavardė </th>
                        <th> Prašymo tipas </th>
                        <th> Teikimo data </th>
                        <th> Statusas </th>
                        <th> Buvus pavardė</th>
                        <th> -- </th>
                        <th> -- </th>
                    </tr>
                    </thead>
                    <tbody>
                        @forelse($users as $user)
                            <tr>
                                <td> {{$user->masterInfo->name ?? $user->user->name ?? $user->user->luadmCilveksCkods->vards}}</td>
                                <td> {{$user->masterInfo->surname ?? $user->user->surname ?? $user->user->luadmCilveksCkods->uzvards}}</td>
                                <td> {{$user->application->name_lt}}</td>
                                <td> {{date('Y-m-d', strtotime($user->submit_date)) }}</td>
                                <td>
                                    @if($user->user->luadmCilveksCkods->surnameChanges->last() != null)
                                        Pakeista
                                    @else
                                        Nepakeista
                                    @endif
                                </td>
                                <td> {{$user->user->luadmCilveksCkods->surnameChanges->last()->previous_surn ?? ''}} </td>
                                <td> <a target="_blank" href="{{'https://epasirasymas.vdu.lt/'.$user->userApplicationLine->where('classification_id', 'INFO0038')->first()->answer_id}}"><i class="far fa-file-image"></i> </a> </td>
                                <td> @if(!empty($user->user->ckods)) <a target="_blank" href="https://studis.vdu.lt/sreg.CLVUP?l=3&P={{$user->user->ckods}}"> Keisti </a> @endif</td>
                            </tr>
                        @empty
                            <tr> Nerado vartotojų </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @if(!empty($users))
        <div class="row">
            <div class="col">{{ $users->links('pagination::bootstrap-4') }}</div>
        </div>
    @endif
</div>

<script>
    $(".status-dropdown").change(function(){
        var status = $(this).val();
        var id = $(this).data('id');
        $.ajax({
            url:"/epasirasymas/nustatymai/pavardes/update/"+id,
            data: { 'status' : status},
            method: 'GET'
        });
    });
</script>