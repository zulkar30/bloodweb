<table class="table table-bordered">
    <tr>
        <th>Blood Type</th>
        <td>{{ isset($blood_supply->blood_type->name) ? $blood_supply->blood_type->name : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Volume</th>
        <td>{{ isset($blood_supply->volume) ? $blood_supply->volume . ' Kantong' : 'N/A' }}</td>
    </tr>
</table>
