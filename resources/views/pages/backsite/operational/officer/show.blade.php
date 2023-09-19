<table class="table table-bordered">
    <tr>
        <th>Akun User</th>
        <td>{{ isset($officer->user->name) ? $officer->user->name : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Nama</th>
        <td>{{ isset($officer->name) ? $officer->name : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Jenis Kelamin</th>
        <td>
            @if($officer->gender == 'laki-laki')
                <span>{{ 'Laki-laki' }}</span>
            @elseif($officer->gender == 'perempuan')
                <span>{{ 'Perempuan' }}</span>
            @else
                <span>{{ 'N/A' }}</span>
            @endif
        </td>
    </tr>
    <tr>
        <th>Tampat Lahir</th>
        <td>{{ isset($officer->birth_place) ? $officer->birth_place : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Tanggal Lahir</th>
        <td>{{ isset($officer->birth_date) ? $officer->birth_date : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Alamat</th>
        <td>{{ isset($officer->address) ? $officer->address : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Kontak</th>
        <td>{{ isset($officer->contact) ? $officer->contact : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Umur</th>
        <td>{{ isset($officer->age) ? $officer->age . ' Tahun' : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Jabatan</th>
        <td>{{ isset($officer->position->name) ? $officer->position->name : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Golongan Darah</th>
        <td>{{ isset($officer->blood_type->name) ? $officer->blood_type->name : 'N/A' }}</td>
    </tr>
    
</table>
