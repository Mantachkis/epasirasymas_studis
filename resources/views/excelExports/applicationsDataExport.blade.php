<table>
    <thead>
        <tr>
            @foreach($headers as $header)
                <th> {{$header}} </th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach($applications as $app)
            <tr>
                @foreach($app as $appFields)
                    <td style="min-width: 100px"> {{$appFields}} </td>
                @endforeach
            </tr>
        @endforeach
    </tbody>
</table>
