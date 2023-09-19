<table class="table table-bordered">
    <tr>
        <th>No CM</th>
        <td>{{ isset($crossmatch->no_cm) ? $crossmatch->no_cm : 'N/A' }}</td>
    </tr>
    <tr>
        <th>No Labu</th>
        <td>{{ isset($crossmatch->screening->aftap->no_labu) ? $crossmatch->screening->aftap->no_labu : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Pasien</th>
        <td>{{ isset($crossmatch->screening->aftap->patient->name) ? $crossmatch->screening->aftap->patient->name : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Pendonor</th>
        <td>{{ isset($crossmatch->screening->aftap->donor->name) ? $crossmatch->screening->aftap->donor->name : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Golongan Darah</th>
        <td>{{ isset($crossmatch->screening->aftap->donor->blood_type->name) ? $crossmatch->screening->aftap->donor->blood_type->name : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Fase 1</th>
        <td>
            @if ($crossmatch->fase1 == 'positif')
                <span >{{ 'Positif' }}</span>
            @elseif($crossmatch->fase1 == 'negatif')
                <span >{{ 'Negatif' }}</span>
            @else
                <span>{{ 'N/A' }}</span>
            @endif
        </td>
    </tr>
    <tr>
        <th>Fase 2</th>
        <td>
            @if ($crossmatch->fase2 == 'positif')
                <span >{{ 'Positif' }}</span>
            @elseif($crossmatch->fase2 == 'negatif')
                <span >{{ 'Negatif' }}</span>
            @else
                <span>{{ 'N/A' }}</span>
            @endif
        </td>
    </tr>
    <tr>
        <th>Fase 3</th>
        <td>
            @if ($crossmatch->fase3 == 'positif')
                <span >{{ 'Positif' }}</span>
            @elseif($crossmatch->fase3 == 'negatif')
                <span >{{ 'Negatif' }}</span>
            @else
                <span>{{ 'N/A' }}</span>
            @endif
        </td>
    </tr>
    <tr>
        <th>Hasil</th>
        <td>
            @if ($crossmatch->result == 'reaktif')
                <span class="badge badge-danger">{{ 'Reaktif' }}</span>
            @elseif($crossmatch->result == 'non-reaktif')
                <span class="badge badge-success">{{ 'Non-Reaktif' }}</span>
            @else
                <span>{{ 'N/A' }}</span>
            @endif
        </td>
    </tr>
    <tr>
        <th>Petugas</th>
        <td>{{ isset($crossmatch->officer->name) ? $crossmatch->officer->name : 'N/A' }}</td>
    </tr>
</table>
