<table class="table table-bordered">
    <tr>
        <th>Golongan Darah</th>
        <td>{{ isset($blood_supply->blood_type->name) ? $blood_supply->blood_type->name : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Jumlah Total</th>
        <td>{{ isset($totalVolume) ? $totalVolume . ' Kantong' : 'N/A' }}</td>
    </tr>
</table>
