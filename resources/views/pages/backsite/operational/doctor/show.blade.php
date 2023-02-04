<table class="table table-bordered">
    <tr>
        <th>User Account</th>
        <td>{{ isset($doctor->user->name) ? $doctor->user->name : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Name</th>
        <td>{{ isset($doctor->name) ? $doctor->name : 'N/A' }}</td>
    </tr>
    <tr>
    <tr>
        <th>Specialist</th>
        <td>{{ isset($doctor->specialist->name) ? $doctor->specialist->name : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Birth Place</th>
        <td>{{ isset($doctor->birth_place) ? $doctor->birth_place : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Birth Date</th>
        <td>{{ isset($doctor->birth_date) ? $doctor->birth_date : 'N/A' }}</td>
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
        <td>{{ isset($doctor->contact) ? $doctor->contact : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Address</th>
        <td>{{ isset($doctor->address) ? $doctor->address : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Age</th>
        <td>{{ isset($doctor->age) ? $doctor->age . ' Tahun' : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Blood Type</th>
        <td>{{ isset($doctor->blood_type->name) ? $doctor->blood_type->name : 'N/A' }}</td>
    </tr>
</table>
