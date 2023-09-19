<table class="table table-bordered">
    <tr>
        <th>No Labu</th>
        <td>{{ isset($screening->aftap->no_labu) ? $screening->aftap->no_labu : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Pendonor</th>
        <td>{{ isset($screening->aftap->donor->name) ? $screening->aftap->donor->name : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Golongan Darah</th>
        <td>{{ isset($screening->aftap->donor->blood_type->name) ? $screening->aftap->donor->blood_type->name : 'N/A' }}</td>
    </tr>
    <tr>
        <th>HIV</th>
        <td>
            @if ($screening->hiv == 'positif')
                <span >{{ 'Positif' }}</span>
            @elseif($screening->hiv == 'negatif')
                <span >{{ 'Negatif' }}</span>
            @else
                <span>{{ 'N/A' }}</span>
            @endif
        </td>
    </tr>
    <tr>
        <th>HCV</th>
        <td>
            @if ($screening->hcv == 'positif')
                <span >{{ 'Positif' }}</span>
            @elseif($screening->hcv == 'negatif')
                <span >{{ 'Negatif' }}</span>
            @else
                <span>{{ 'N/A' }}</span>
            @endif
        </td>
    </tr>
    <tr>
        <th>HBSAG</th>
        <td>
            @if ($screening->hbsag == 'positif')
                <span >{{ 'Positif' }}</span>
            @elseif($screening->hbsag == 'negatif')
                <span >{{ 'Negatif' }}</span>
            @else
                <span>{{ 'N/A' }}</span>
            @endif
        </td>
    </tr>
    <tr>
        <th>VDRl</th>
        <td>
            @if ($screening->vdrl == 'positif')
                <span >{{ 'Positif' }}</span>
            @elseif($screening->vdrl == 'negatif')
                <span >{{ 'Negatif' }}</span>
            @else
                <span>{{ 'N/A' }}</span>
            @endif
        </td>
    </tr>
    <tr>
        <th>Hasil</th>
        <td>
            @if ($screening->result == 'reaktif')
                <span class="badge badge-danger">{{ 'Reaktif' }}</span>
            @elseif($screening->result == 'non-reaktif')
                <span class="badge badge-success">{{ 'Non-Reaktif' }}</span>
            @else
                <span>{{ 'N/A' }}</span>
            @endif
        </td>
    </tr>
    <tr>
        <th>Petugas</th>
        <td>{{ isset($screening->officer->name) ? $screening->officer->name : 'N/A' }}</td>
    </tr>
</table>
