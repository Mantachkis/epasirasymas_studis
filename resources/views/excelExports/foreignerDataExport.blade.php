<table>
    <thead>
    <tr>
        <th> # </th>
        <th> Pateikimo data </th>
        @foreach($headers as $header)
            <th> @lang('foreignerInfoShow.'.$header) </th>
        @endforeach
    </tr>
    </thead>
    <tbody>
    @foreach($applications as $key => $app)
        <tr>
            <td> {{$key}} </td>
            @foreach($app as $appFields)
                <td style="min-width: 100px"> {{$appFields}} </td>
            @endforeach
        </tr>
    @endforeach
    </tbody>
</table>
