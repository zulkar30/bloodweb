<table class="table table-bordered">
    <tr>
        <th>User Account</th>
        <td>{{ isset($officer->user->name) ? $officer->user->name : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Name</th>
        <td>{{ isset($officer->name) ? $officer->name : 'N/A' }}</td>
    </tr>
    <tr>
    <tr>
        <th>Position</th>
        <td>{{ isset($officer->position->name) ? $officer->position->name : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Birth Place</th>
        <td>{{ isset($officer->birth_place) ? $officer->birth_place : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Birth Date</th>
        <td>{{ isset($officer->birth_date) ? $officer->birth_date : 'N/A' }}</td>
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
        <td>{{ isset($officer->contact) ? $officer->contact : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Address</th>
        <td>{{ isset($officer->address) ? $officer->address : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Age</th>
        <td>{{ isset($officer->age) ? $officer->age . ' Tahun' : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Blood Type</th>
        <td>{{ isset($officer->blood_type->name) ? $officer->blood_type->name : 'N/A' }}</td>
    </tr>
</table>
