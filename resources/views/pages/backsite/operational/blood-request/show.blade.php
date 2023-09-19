<table class="table table-bordered">
    <tr>
        <th>No BR</th>
        <td>{{ isset($blood_request->no_br) ? $blood_request->no_br : 'N/A' }}</td>
    </tr>
    <tr>
        <th>No MR</th>
        <td>{{ isset($blood_request->patient->no_mr) ? $blood_request->patient->no_mr : 'Tidak Ada' }}</td>
    </tr>
    <tr>
        <th>Nama</th>
        <td>{{ isset($blood_request->patient->name) ? $blood_request->patient->name : $blood_request->name }}</td>
    </tr>
    <tr>
        <th>GolDa Permintaan</th>
        <td>{{ isset($blood_request->patient->blood_type->name) ? $blood_request->patient->blood_type->name : $blood_request->blood_type->name }}
        </td>
    </tr>
    <tr>
        <th>Darah Lengkap</th>
        <td>{{ isset($blood_request->wb) ? $blood_request->wb . ' Komponen' : ' 0 Komponen' }}</td>
    </tr>
    <tr>
        <th>Darah Cuci</th>
        <td>{{ isset($blood_request->we) ? $blood_request->we . ' Komponen' : ' 0 Komponen' }}</td>
    </tr>
    <tr>
        <th>Sel Darah Merah</th>
        <td>{{ isset($blood_request->prc) ? $blood_request->prc . ' Komponen' : ' 0 Komponen' }}</td>
    </tr>
    <tr>
        <th>Trombosit</th>
        <td>{{ isset($blood_request->tc) ? $blood_request->tc . ' Komponen' : ' 0 Komponen' }}</td>
    </tr>
    <tr>
        <th>Plasma Segar Beku</th>
        <td>{{ isset($blood_request->ffp) ? $blood_request->ffp . ' Komponen' : ' 0 Komponen' }}</td>
    </tr>
    <tr>
        <th>Kriosipitat</th>
        <td>{{ isset($blood_request->cry) ? $blood_request->cry . ' Komponen' : ' 0 Komponen' }}</td>
    </tr>
    <tr>
        <th>Plasma</th>
        <td>{{ isset($blood_request->plasma) ? $blood_request->plasma . ' Komponen' : ' 0 Komponen' }}</td>
    </tr>
    <tr>
        <th>Plasma Kaya Trombosit</th>
        <td>{{ isset($blood_request->prp) ? $blood_request->prp . ' Komponen' : ' 0 Komponen' }}</td>
    </tr>
    <tr>
        <th>Total Permintaan</th>
        <td>{{ isset($blood_request->total) ? $blood_request->total . ' Komponen' : ' 0 Komponen' }}</td>
    </tr>
    <tr>
        <th>Total Terpenuhi</th>
        <td>{{ isset($blood_request->fulfilled) ? $blood_request->fulfilled . ' Komponen' : ' 0 Komponen' }}</td>
    </tr>
    <tr>
        <th>Status</th>
        <td>
            @if ($blood_request->status == 'diterima')
                <span class="badge badge-success">{{ 'Diterima' }}</span>
            @elseif($blood_request->status == 'menunggu')
                <span class="badge badge-warning">{{ 'Menunggu' }}</span>
            @elseif($blood_request->status == 'ditolak')
                <span class="badge badge-danger">{{ 'Ditolak' }}</span>
            @else
                <span>{{ 'N/A' }}</span>
            @endif
        </td>
    </tr>
    <tr>
        <th>Dokter</th>
        <td>{{ isset($blood_request->doctor->name) ? $blood_request->doctor->name : 'Tidak Ada' }}</td>
    </tr>
    <tr>
        <th>Petugas</th>
        <td>{{ isset($blood_request->officer->name) ? $blood_request->officer->name : 'Tidak Ada' }}</td>
    </tr>
</table>
