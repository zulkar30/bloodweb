<table class="table table-bordered">
    <tr>
        <th>No Labu</th>
        <td>{{ isset($aftap->no_labu) ? $aftap->no_labu : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Pasien</th>
        <td>{{ isset($aftap->patient->name) ? $aftap->patient->name : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Pendonor</th>
        <td>{{ isset($aftap->donor->name) ? $aftap->donor->name : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Golongan Darah</th>
        <td>{{ isset($aftap->patient->blood_type->name) ? $aftap->patient->blood_type->name : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Jenis Kantong</th>
        <td>{{ isset($aftap->pouch_type->name) ? $aftap->pouch_type->name : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Jumlah</th>
        <td>{{ isset($aftap->volume) ? $aftap->volume . ' Kantong' : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Petugas</th>
        <td>{{ isset($aftap->officer->name) ? $aftap->officer->name : 'N/A' }}</td>
    </tr>
</table>
