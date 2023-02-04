<table class="table table-bordered">
    <tr>
        <th>Blood Type</th>
        <td>{{ isset($aftap->blood_type->name) ? $aftap->blood_type->name : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Pouch Type</th>
        <td>{{ isset($aftap->pouch_type->name) ? $aftap->pouch_type->name : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Volume</th>
        <td>{{ isset($aftap->volume) ? $aftap->volume . ' Kantong' : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Donor</th>
        <td>{{ isset($aftap->donor->name) ? $aftap->donor->name : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Officer</th>
        <td>{{ isset($aftap->officer->name) ? $aftap->officer->name : 'N/A' }}</td>
    </tr>
</table>
