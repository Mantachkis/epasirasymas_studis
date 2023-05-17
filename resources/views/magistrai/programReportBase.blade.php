@include ('layouts.main')
@include('magistrai.partials.programReportSearch')
@yield ('scripts')
@yield ('header')
@yield('js')

{{Breadcrumbs::render()}}
<div class="container-fluid">
    <div class="row">
        @yield('programReportSearch')
    </div>
    <div class="row">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th> # </th>
                        <th> Prioritetas </th>
                        <th> Vardas, pavardė </th>
                        <th> Tel. nr. </th>
                        <th> Institucija </th>
                        <th> Baigimo metai </th>
                        <th> Finansavimas </th>
                        <th> Konkursinis balas </th>
                        <th> Išsiųsta </th>
                        <th> Pasirašyta  </th>
                    </tr>
                </thead>
                <tbody>
                    @if(!empty($students))
                        @foreach($students as $k => $student)
                            <tr>
                                <td> {{$loop->index+1}} </td>
                                <td> {{$student->priority_no}} </td>
                                <td> {{$student->masterInfo->name}} {{$student->masterInfo->surname}} </td>
                                <td> {{$student->masterInfo->phone_no}} </td>
                                <td> {{$student->masterInfo->grade_place}} </td>
                                <td> {{$student->masterInfo->grade_year}} </td>
                                <td> {{$student->finance_type}} </td>
                                <td> {{$student->cum_score}} </td>
                                <td> @if(!empty($student->bpoPakviestiEsign)) <i class="fas fa-check"></i> @endif </td>
                                <td> @if(!empty($student->bpoPakviestiEsign->agreement)) <i class="fas fa-check"></i>  @endif</td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
