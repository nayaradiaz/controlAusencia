<div>
    <h2>Administrar Usuarios</h2>

    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Email</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @if(isset($users) && $users->count() > 0)
            @foreach($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
            </tr>
            @endforeach
            @else
            <tr>
                <td colspan="3">No hay usuarios registrados.</td>
            </tr>
            @endif

        </tbody>
    </table>
</div>