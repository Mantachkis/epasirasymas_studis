@if (count($users) != 0)
    <p>Epasirašymas naudotojai</p>
    <table class="table table-hover">
        <thead class="thead-dark">
        <tr>
            <th>#</th>
            <th>ID</th>
            <th class="text-left">Vardas Pavardė</th>
            <th class="text-left">Asmens kodas</th>
            <th class="text-left">El. paštas</th>
            <th>Ar. keitė</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach ($users as $key => $user)
            <tr>
                @if ($user->cilveksPersCode)
                    <td>{{$key+1}}</td>
                    <td>{{$user->id}}</td>
                    <td class="text-left">{{$user->name}} {{$user->surname}} (<small><b>{{$user->cilveksPersCode->vards}} {{$user->cilveksPersCode->uzvards}}</b></small>)</td>
                    <td class="text-left">{{$user->pers_code}} (<small><b>{{$user->cilveksPersCode->pers_kods}}</b></small>)</td>
                    <td class="text-left">{{$user->email}} (<small><b>{{$user->cilveksPersCode->nod_gk_vieta}}</b></small>)</td>
                @else
                    <td>{{$key+1}}</td>
                    <td>{{$user->id}}</td>
                    <td class="text-left">{{$user->name}} {{$user->surname}}</td>
                    <td class="text-left">{{$user->pers_code}}</td>
                    <td class="text-left">{{$user->email}}</td>
                @endif
                <td>
                    @if ($user->pass_link)
                        Taip
                    @else
                        Ne
                    @endif
                </td>
                <td><button type="button" class="btn btn-dark editUser" data-toggle="modal" data-target="#editModal" data-id="{{$user->id}}" data-type="user">Tvarkyti</button></td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endif
@if (count($vdu_users) != 0)
    <p>VDU naudotojai</p>
    <table class="table table-hover">
        <thead class="thead-dark">
        <tr>
            <th>#</th>
            <th>ID</th>
            <th class="text-left">Vardas Pavardė</th>
            <th class="text-left">Asmens kodas</th>
            <th class="text-left">El. paštas</th>
            <th>Ar. keitė</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach ($vdu_users as $key => $user)
            @if ($user->espUsers)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$user->espUsers->id}}</td>
                    <td class="text-left">{{$user->espUsers->name}} {{$user->surname}} (<small><b>{{$user->vards}} {{$user->uzvards}}</b></small>)</td>
                    <td class="text-left">{{$user->espUsers->pers_code}} (<small><b>{{$user->pers_kods}}</b></small>)</td>
                    <td class="text-left">{{$user->espUsers->email}} (<small><b>{{$user->nod_gk_vieta}}</b></small>)</td>
                    <td>
                        @if ($user->pass_link)
                            Taip
                        @else
                            Ne
                        @endif
                    </td>
                    <td><button type="button" class="btn btn-dark editUser" data-toggle="modal" data-target="#editModal" data-id="{{$user->espUsers->id}}" data-type="vdu">Tvarkyti</button></td>
                </tr>
            @endif
        @endforeach
        </tbody>
    </table>
@endif