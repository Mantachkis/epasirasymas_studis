
<div class="row">
    <div class="col-md-12">
        @if ($searchResults->count() > 0)
            <p><b>Viso įrašų: {{$searchResults->count()}}</b></p>
            <table class="table table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>Vardas</th>
                        <th class="sortable">Pavardė <i class="fa fa-sort" aria-hidden="true"></i></th>
                        <th>Asm. kod.</th>
                        <th>Telefonas</th>
                        <th>El. paštas</th>
                        <th>Metai / etapas</th>
                        <th class="sortable">Fin. <i class="fa fa-sort" aria-hidden="true"></i></th>
                        <th>Prog. pav.</th>
                        <th class="sortable">Statusas <i class="fa fa-sort" aria-hidden="true"></i></th>
                        <th>Įgaliotas asmuo</th>
                        <th>Ok</th>
                        <th>Funkcijos</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($searchResults as $searchResult)
                    <tr>
                        <td>{{$searchResult->vardas}}</td>
                        <td>{{$searchResult->pavarde}}</td>
                        <td>{{$searchResult->asmens_kodas}}</td>
                        <td>
                            {{$searchResult->pirmas_telef}}
                            @if ($searchResult->pirmas_telef != $searchResult->antras_telef)
                                {{$searchResult->antras_telef}}
                            @endif
                        </td>
                        <td>{{$searchResult->elpastas}}</td>
                        <td>{{$searchResult->metai}}</td>
                        <td>{{$searchResult->finansavimas}}</td>
                        <td>
                            @if (!empty($searchResult->luadmProgrammaPkods->pnosauk))
                                {{$searchResult->luadmProgrammaPkods->pnosauk}}
                            @endif
                        </td>
                        <td>
                            {{$searchResult->agreement->agreementAgreementStatus->description_lt}}
                            @if ($searchResult->agreement->agreement_status == 'AS0002')
                               @switch ($searchResult->agreement->agreed_with)
                                   @case ('egates')
                                        (El. Vartai)
                                        @break
                                   @case ('login_vdu')
                                        (VDU paskyra)
                                        @break
                                   @case ('login_user')
                                        (Paskyra)
                                        @break
                                   @default
                                        (Kita)
                               @endswitch
                            @endif
                        </td>
                        <td>{{$searchResult->agreement->additional_person}}</td>
                        <td><input style="margin: 0 auto;" type="checkbox" onclick="updateOk({{$searchResult->agreement->id}});" @if ($searchResult->agreement->ok_check == 1) checked @endif></td>
                        <td>
                            @if ($searchResult->agreement->agreement_status != 'AS0003')
                                <a href="#" class="btn btn-dark" title="Pridėti įgaliotą asmenį" data-toggle="modal" data-target="#additionalPersonModal" onclick="additionalPersonView('{{$searchResult->agreement_id}}');"><i class="fa fa-user fa-inverse" aria-hidden="true"></i></a>
                            @endif
                            @if ($searchResult->agreement->agreement_status != 'AS0003')
                            <a href="#" class="btn btn-dark" title="Nutraukti sutartį" data-toggle="modal" data-target="#agreementCancelModal" onclick="cancelAgreement('{{$searchResult->agreement_id}}');"><i class="fa fa-minus-square fa-inverse" aria-hidden="true"></i></a>
                            @endif
                            <a href="#" class="btn btn-dark" title="Failai" data-toggle="modal" data-target="#userFileModal" onclick="agreementFileList('{{$searchResult->agreement_id}}')"><i class="fa fa-file fa-inverse" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <p><b>Nieko nerasta</b></p>
        @endif
    </div>
</div>
<script>
    $(document).ready(function(){
        $(".table").tablesorter( {selectorHeaders: "thead th.sortable" } ); });
</script>