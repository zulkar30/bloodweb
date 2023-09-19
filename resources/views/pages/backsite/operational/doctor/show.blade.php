<table class="table table-bordered">
    <tr>
        <th>Akun User</th>
        <td>{{ isset($doctor->user->name) ? $doctor->user->name : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Nama</th>
        <td>{{ isset($doctor->name) ? $doctor->name : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Jenis Kelamin</th>
        <td>
            @if($doctor->gender == 'laki-laki')
                <span>{{ 'Laki-laki' }}</span>
            @elseif($doctor->gender == 'perempuan')
                <span>{{ 'Perempuan' }}</span>
            @else
                <span>{{ 'N/A' }}</span>
            @endif
        </td>
    </tr>
    <tr>
        <th>Tempat Lahir</th>
        <td>{{ isset($doctor->birth_place) ? $doctor->birth_place : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Tanggal Lahir</th>
        <td>{{ isset($doctor->birth_date) ? $doctor->birth_date : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Alamat</th>
        <td>{{ isset($doctor->address) ? $doctor->address : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Kontak</th>
        <td>{{ isset($doctor->contact) ? $doctor->contact : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Umur</th>
        <td>{{ isset($doctor->age) ? $doctor->age . ' Tahun' : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Golongan Darah</th>
        <td>{{ isset($doctor->blood_type->name) ? $doctor->blood_type->name : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Spesialis</th>
        <td>{{ isset($doctor->specialist->name) ? $doctor->specialist->name : 'N/A' }}</td>
    </tr>
</table>
