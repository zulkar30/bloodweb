<table class="table table-bordered">
    <tr>
        <th>No BD</th>
        <td>{{ isset($blood_donor->no_bd) ? $blood_donor->no_bd : 'N/A' }}</td>
    </tr>
    <tr>
        <th>No BR</th>
        <td>{{ isset($blood_donor->blood_request->no_br) ? $blood_donor->blood_request->no_br : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Nama</th>
        <td>{{ isset($blood_donor->name) ? $blood_donor->name : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Golongan Darah</th>
        <td>{{ isset($blood_donor->blood_type->name) ? $blood_donor->blood_type->name : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Hemoglobin Darah</th>
        <td>{{ isset($blood_donor->hb) ? $blood_donor->hb : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Tensi Meter</th>
        <td>{{ isset($blood_donor->t_meter) ? $blood_donor->t_meter : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Berat Badan</th>
        <td>{{ isset($blood_donor->bb) ? $blood_donor->bb : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Petugas</th>
        <td>{{ isset($blood_donor->officer->name) ? $blood_donor->officer->name : 'N/A' }}</td>
    </tr>
</table>
