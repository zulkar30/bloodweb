<table class="table table-bordered">
    <tr>
        <th>Name</th>
        <td>{{ isset($blood_donor->donor->name) ? $blood_donor->donor->name : 'N/A' }}</td>
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
        <th>Age</th>
        <td>{{ isset($blood_donor->age) ? $blood_donor->age . ' Tahun' : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Blood Type</th>
        <td>{{ isset($blood_donor->blood_type->name) ? $blood_donor->blood_type->name : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Donor Type</th>
        <td>{{ isset($blood_donor->donor_type->name) ? $blood_donor->donor_type->name : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Pouch Type</th>
        <td>{{ isset($blood_donor->pouch_type->name) ? $blood_donor->pouch_type->name : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Donor Reaction</th>
        <td>
            @if($blood_donor->donor_reaction == 1)
                <span>{{ 'Pingsan' }}</span>
            @elseif($blood_donor->donor_reaction == 2)
                <span>{{ 'Mual' }}</span>
            @elseif($blood_donor->donor_reaction == 3)
                <span>{{ 'Lainnya' }}</span>
            @else
                <span>{{ 'N/A' }}</span>
            @endif
        </td>
    </tr>
    <tr>
        <th>Retrieval Process</th>
        <td>
            @if($blood_donor->retrieval_process == 1)
                <span>{{ 'Lancar' }}</span>
            @elseif($blood_donor->retrieval_process == 2)
                <span>{{ 'Macet' }}</span>
            @elseif($blood_donor->retrieval_process == 3)
                <span>{{ 'Lainnya' }}</span>
            @else
                <span>{{ 'N/A' }}</span>
            @endif
        </td>
    </tr>
    <tr>
        <th>Donor Status</th>
        <td>
            @if($blood_donor->donor_status == 1)
                <span class="badge badge-success">{{ 'Pendonor Baru' }}</span>
            @elseif($blood_donor->donor_status == 2)
                <span class="badge badge-warning">{{ 'Pendonor Lama' }}</span>
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
