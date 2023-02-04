<table class="table table-bordered">
    <tr>
        <th>Blood Type</th>
        <td>{{ isset($screening->blood_type->name) ? $screening->blood_type->name : 'N/A' }}</td>
    </tr>
    <tr>
        <th>HIV</th>
        <td>
            @if ($screening->hiv == 1)
                <span class="badge badge-success">{{ 'Positif' }}</span>
            @elseif($screening->hiv == 2)
                <span class="badge badge-warning">{{ 'Negatif' }}</span>
            @else
                <span>{{ 'N/A' }}</span>
            @endif
        </td>
    </tr>
    <tr>
        <th>HCV</th>
        <td>
            @if ($screening->hcv == 1)
                <span class="badge badge-success">{{ 'Positif' }}</span>
            @elseif($screening->hcv == 2)
                <span class="badge badge-warning">{{ 'Negatif' }}</span>
            @else
                <span>{{ 'N/A' }}</span>
            @endif
        </td>
    </tr>
    <tr>
        <th>HBSAG</th>
        <td>
            @if ($screening->hbsag == 1)
                <span class="badge badge-success">{{ 'Positif' }}</span>
            @elseif($screening->hbsag == 2)
                <span class="badge badge-warning">{{ 'Negatif' }}</span>
            @else
                <span>{{ 'N/A' }}</span>
            @endif
        </td>
    </tr>
    <tr>
        <th>VDRl</th>
        <td>
            @if ($screening->vdrl == 1)
                <span class="badge badge-success">{{ 'Positif' }}</span>
            @elseif($screening->vdrl == 2)
                <span class="badge badge-warning">{{ 'Negatif' }}</span>
            @else
                <span>{{ 'N/A' }}</span>
            @endif
        </td>
    </tr>
    <tr>
        <th>Result</th>
        <td>
            @if ($screening->result == 1)
                <span class="badge badge-success">{{ 'Positif' }}</span>
            @elseif($screening->result == 2)
                <span class="badge badge-warning">{{ 'Negatif' }}</span>
            @else
                <span>{{ 'N/A' }}</span>
            @endif
        </td>
    </tr>
    <tr>
        <th>Officer</th>
        <td>{{ isset($screening->officer->name) ? $screening->officer->name : 'N/A' }}</td>
    </tr>
</table>
