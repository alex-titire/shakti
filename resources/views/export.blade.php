<table>
    @foreach ($data as $i => $item)
    <tr>
        <td>{{ $i }}</td>
        <td>
            <img src="images/reg/{{ $item->image }}" height="100px">
        </td>
        <td>{{ $item->first_name }}</td>
        <td>{{ $item->image }}</td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    @endforeach
</table>
