<table class="table table-bordered">
    <tr>
        <th>No Reg</th>
        <td>{{ isset($donor->no_reg) ? $donor->no_reg : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Nama</th>
        <td>{{ isset($donor->name) ? $donor->name : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Jenis Kelamin</th>
        <td>
            @if($donor->gender == 'laki-laki')
                <span>{{ 'Laki-laki' }}</span>
            @elseif($donor->gender == 'perempuan')
                <span>{{ 'Perempuan' }}</span>
            @else
                <span>{{ 'N/A' }}</span>
            @endif
        </td>
    </tr>
    <tr>
        <th>Tempat Lahir</th>
        <td>{{ isset($donor->birth_place) ? $donor->birth_place : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Tanggal Lahir</th>
        <td>{{ isset($donor->birth_date) ? $donor->birth_date : 'N/A' }}</td>
    </tr>
    <tr>
        <th>NIK</th>
        <td>{{ isset($donor->nik) ? $donor->nik : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Alamat</th>
        <td>{{ isset($donor->address) ? $donor->address : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Kontak</th>
        <td>{{ isset($donor->contact) ? $donor->contact : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Umur</th>
        <td>{{ isset($donor->age) ? $donor->age . ' Tahun' : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Pekerjaan</th>
        <td>{{ isset($donor->profession->name) ? $donor->profession->name : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Golongan Darah</th>
        <td>{{ isset($donor->blood_type->name) ? $donor->blood_type->name : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Jenis Pendonor</th>
        <td>{{ isset($donor->donor_type->name) ? $donor->donor_type->name : 'N/A' }}</td>
    </tr>
</table>
