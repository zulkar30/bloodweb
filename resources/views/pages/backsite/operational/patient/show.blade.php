<table class="table table-bordered">
    <tr>
        <th>Name</th>
        <td>{{ isset($patient->name) ? $patient->name : 'N/A' }}</td>
    </tr>
    <tr>
    <tr>
        <th>Room</th>
        <td>{{ isset($patient->room->name) ? $patient->room->name : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Birth Place</th>
        <td>{{ isset($patient->birth_place) ? $patient->birth_place : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Birth Date</th>
        <td>{{ isset($patient->birth_date) ? $patient->birth_date : 'N/A' }}</td>
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
        <th>Contact</th>
        <td>{{ isset($patient->contact) ? $patient->contact : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Address</th>
        <td>{{ isset($patient->address) ? $patient->address : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Age</th>
        <td>{{ isset($patient->age) ? $patient->age . ' Tahun' : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Blood Type</th>
        <td>{{ isset($patient->blood_type->name) ? $patient->blood_type->name : 'N/A' }}</td>
    </tr>
</table>
