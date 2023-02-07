<table class="table table-bordered">
    <tr>
        <th>Name</th>
        <td>{{ isset($donor->name) ? $donor->name : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Profession</th>
        <td>{{ isset($donor->profession->name) ? $donor->profession->name : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Birth Place</th>
        <td>{{ isset($donor->birth_place) ? $donor->birth_place : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Birth Date</th>
        <td>{{ isset($donor->birth_date) ? $donor->birth_date : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Gender</th>
        <td>
            @if($donor->gender == 1)
                <span>{{ 'Laki-laki' }}</span>
            @elseif($donor->gender == 2)
                <span>{{ 'Perempuan' }}</span>
            @else
                <span>{{ 'N/A' }}</span>
            @endif
        </td>
    </tr>
    <tr>
        <th>Contact</th>
        <td>{{ isset($donor->contact) ? $donor->contact : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Address</th>
        <td>{{ isset($donor->address) ? $donor->address : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Age</th>
        <td>{{ isset($donor->age) ? $donor->age . ' Tahun' : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Blood Type</th>
        <td>{{ isset($donor->blood_type->name) ? $donor->blood_type->name : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Donor Type</th>
        <td>{{ isset($donor->donor_type->name) ? $donor->donor_type->name : 'N/A' }}</td>
    </tr>
</table>
