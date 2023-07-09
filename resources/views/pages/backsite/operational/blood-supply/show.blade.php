<table class="table table-bordered">
    <tr>
        <th>Blood Type</th>
        <td>{{ isset($blood_supply->blood_type->name) ? $blood_supply->blood_type->name : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Total Volume</th>
        <td>{{ isset($totalVolume) ? $totalVolume . ' Kantong' : 'N/A' }}</td>
    </tr>
</table>
