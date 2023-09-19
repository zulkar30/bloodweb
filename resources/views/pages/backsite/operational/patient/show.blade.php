<table class="table table-bordered">
    <tr>
        <th>No MR</th>
        <td>{{ isset($patient->no_mr) ? $patient->no_mr : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Nama</th>
        <td>{{ isset($patient->name) ? $patient->name : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Jenis Kelamin</th>
        <td>
            @if($patient->gender == 'laki-laki')
                <span>{{ 'Laki-laki' }}</span>
            @elseif($patient->gender == 'perempuan')
                <span>{{ 'Perempuan' }}</span>
            @else
                <span>{{ 'N/A' }}</span>
            @endif
        </td>
    </tr>
    <tr>
        <th>Tempat Lahir</th>
        <td>{{ isset($patient->birth_place) ? $patient->birth_place : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Tanggal Lahir</th>
        <td>{{ isset($patient->birth_date) ? $patient->birth_date : 'N/A' }}</td>
    </tr>
    <tr>
        <th>NIK</th>
        <td>{{ isset($patient->nik) ? $patient->nik : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Alamat</th>
        <td>{{ isset($patient->address) ? $patient->address : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Kontak</th>
        <td>{{ isset($patient->contact) ? $patient->contact : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Umur</th>
        <td>{{ isset($patient->age) ? $patient->age . ' Tahun' : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Diagnosa</th>
        <td>{{ isset($patient->diagnosis) ? $patient->diagnosis : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Golongan Darah</th>
        <td>{{ isset($patient->blood_type->name) ? $patient->blood_type->name : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Bidang Perawatan</th>
        <td>{{ isset($patient->maintenance_section->name) ? $patient->maintenance_section->name : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Ruangan</th>
        <td>{{ isset($patient->room->name) ? $patient->room->name : 'N/A' }}</td>
    </tr>
</table>
