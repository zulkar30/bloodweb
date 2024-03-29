<table class="table table-bordered">
    <tr>
        <th>Nama</th>
        <td>{{ isset($user->name) ? $user->name : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Email</th>
        <td>{{ isset($user->email) ? $user->email : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Peran</th>
        <td>
            @foreach ($user->role as $id => $role)
                <span class="badge bg-yellow text-dark mr-1 mb-1">{{ isset($role->name) ? $role->name : 'N/A' }}</span>
            @endforeach
        </td>
    </tr>
    <tr>
        <th>Jenis User</th>
        <td>
            <span
                class="badge bg-success mr-1 mb-1">{{ isset($user->detail_user->type_user->name) ? $user->detail_user->type_user->name : 'N/A' }}</span>
        </td>
    </tr>
</table>
