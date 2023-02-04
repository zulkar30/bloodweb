<table class="table table-bordered">
    <tr>
        <th>Name</th>
        <td>{{ isset($blood_request->patient->name) ? $blood_request->patient->name : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Blood Type</th>
        <td>{{ isset($blood_request->blood_type->name) ? $blood_request->blood_type->name : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Whole Blood</th>
        <td>{{ isset($blood_request->wb) ? $blood_request->wb : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Whases Eritrosit</th>
        <td>{{ isset($blood_request->we) ? $blood_request->we : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Packed Red Cell</th>
        <td>{{ isset($blood_request->prc) ? $blood_request->prc : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Trombosite Concentrate</th>
        <td>{{ isset($blood_request->tc) ? $blood_request->tc : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Fresh Frozen Plasma</th>
        <td>{{ isset($blood_request->ffp) ? $blood_request->ffp : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Cryocitate</th>
        <td>{{ isset($blood_request->cry) ? $blood_request->cry : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Plasma</th>
        <td>{{ isset($blood_request->plasma) ? $blood_request->plasma : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Platelet Rich Plasma</th>
        <td>{{ isset($blood_request->prp) ? $blood_request->prp : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Total</th>
        <td>{{ isset($blood_request->total) ? $blood_request->total : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Fulfilled</th>
        <td>{{ isset($blood_request->fulfilled) ? $blood_request->fulfilled : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Status</th>
        <td>
            @if($blood_request->status == 1)
                <span class="badge badge-success">{{ 'Approved' }}</span>
            @elseif($blood_request->status == 2)
                <span class="badge badge-warning">{{ 'Rejected' }}</span>
            @else
                <span>{{ 'N/A' }}</span>
            @endif
        </td>
    </tr>
    <tr>
        <th>Doctor</th>
        <td>{{ isset($blood_request->doctor->name) ? $blood_request->doctor->name : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Officer</th>
        <td>{{ isset($blood_request->officer->name) ? $blood_request->officer->name : 'N/A' }}</td>
    </tr>
</table>
