<table class="table table-bordered">
    <tr>
        <th>Name</th>
        <td>{{ isset($blood_donor->name) ? $blood_donor->name : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Gender</th>
        <td>
            @if($blood_donor->gender == 1)
                <span>{{ 'Laki-laki' }}</span>
            @elseif($blood_donor->gender == 2)
                <span>{{ 'Perempuan' }}</span>
            @else
                <span>{{ 'N/A' }}</span>
            @endif
        </td>
    </tr>
    <tr>
        <th>Hemoglobin</th>
        <td>{{ isset($blood_donor->hb) ? $blood_donor->hb : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Tekanan Darah</th>
        <td>{{ isset($blood_donor->tm) ? $blood_donor->tm : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Berat Badan</th>
        <td>{{ isset($blood_donor->bb) ? $blood_donor->bb : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Blood Type</th>
        <td>{{ isset($blood_donor->blood_type->name) ? $blood_donor->blood_type->name : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Status</th>
        <td>
            @if($blood_donor->status == 1)
                <span class="badge badge-success">{{ 'Approved' }}</span>
            @elseif($blood_donor->status == 2)
                <span class="badge badge-warning">{{ 'Rejected' }}</span>
            @else
                <span>{{ 'N/A' }}</span>
            @endif
        </td>
    </tr>
    <tr>
        <th>Officer</th>
        <td>{{ isset($blood_donor->officer->name) ? $blood_donor->officer->name : 'N/A' }}</td>
    </tr>
</table>
