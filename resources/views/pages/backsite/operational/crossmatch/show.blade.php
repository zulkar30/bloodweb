<table class="table table-bordered">
    <tr>
        <th>Blood Type</th>
        <td>{{ isset($crossmatch->blood_type->name) ? $crossmatch->blood_type->name : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Fase 1</th>
        <td>
            @if ($crossmatch->fase1 == 1)
                <span class="badge badge-success">{{ 'Positif' }}</span>
            @elseif($crossmatch->fase1 == 2)
                <span class="badge badge-warning">{{ 'Negatif' }}</span>
            @else
                <span>{{ 'N/A' }}</span>
            @endif
        </td>
    </tr>
    <tr>
        <th>Fase 2</th>
        <td>
            @if ($crossmatch->fase2 == 1)
                <span class="badge badge-success">{{ 'Positif' }}</span>
            @elseif($crossmatch->fase2 == 2)
                <span class="badge badge-warning">{{ 'Negatif' }}</span>
            @else
                <span>{{ 'N/A' }}</span>
            @endif
        </td>
    </tr>
    <tr>
        <th>Fase 3</th>
        <td>
            @if ($crossmatch->fase3 == 1)
                <span class="badge badge-success">{{ 'Positif' }}</span>
            @elseif($crossmatch->fase3 == 2)
                <span class="badge badge-warning">{{ 'Negatif' }}</span>
            @else
                <span>{{ 'N/A' }}</span>
            @endif
        </td>
    </tr>
    <tr>
        <th>Result</th>
        <td>
            @if ($crossmatch->result == 1)
                <span class="badge badge-success">{{ 'Positif' }}</span>
            @elseif($crossmatch->result == 2)
                <span class="badge badge-warning">{{ 'Negatif' }}</span>
            @else
                <span>{{ 'N/A' }}</span>
            @endif
        </td>
    </tr>
    <tr>
        <th>Officer</th>
        <td>{{ isset($crossmatch->officer->name) ? $crossmatch->officer->name : 'N/A' }}</td>
    </tr>
</table>
