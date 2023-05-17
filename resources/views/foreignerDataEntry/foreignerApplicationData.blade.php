<div class="container-fluid">
    <table class="table table-bordered">
        <tbody>
            @foreach($fieldData[$id] as $key => $data)
                @if($loop->index < 2) @continue @endif
                <tr>
                    <td> @lang("foreignerInfoShow.$key") </td>
                    @if($key === 'skvc-recommendation-file')
                        <td> <a href="{{$data}}"> <i class="fa fa-upload"></i> </a> </td>
                    @else
                        <td> {{$data}} </td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
