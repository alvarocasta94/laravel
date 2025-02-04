@extends('layout')

@section('title', 'Listado de Retos')

@section('content')

<body>
<div class="container-fluid">
    <div class="row">
        <!-- Barra de navegación -->
        <nav class="col-2 bg-light vh-100 p-2">
            <a class="nav-link active" aria-current="page" href="#">Equipos</a>
            <a class="nav-link" href="#">Participantes</a>
            <a class="nav-link" href="#">Publicaciones</a>
            <a class="nav-link" href="#">Sedes</a>
            <a class="nav-link" href="#">Centros</a>
            <a class="nav-link disabled" aria-disabled="true">Disabled</a>
        </nav>

        <!-- Contenido principal -->    
        <main class="col-10">
            <h1>Lista de Retos</h1>
            <a href="{{ route('retos.create') }}" class="btn btn-primary">Añadir nuevo reto</a>

            <!-- Tabla -->
            <table class="table table-striped table-hover caption-top">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Estudios</th>
                        <th scope="col">Centro</th> <!-- Campo fk_centro -->
                        <th scope="col">Torneo</th> <!-- Campo fk_torneo -->
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($retos as $reto)
                    <tr>
                        <td>{{ $reto->id_reto }}</td>
                        <td>{{ $reto->nombre }}</td>
                        <td>{{ $reto->descripcion }}</td>
                        <td>{{ $reto->estudios }}</td>
                        <td>{{ $reto->centro ? $reto->centro->nombre : 'No asignado' }}</td> <!-- Mostrar el nombre del centro -->
                        <td>{{ $reto->torneo ? $reto->torneo->nombre : 'No asignado' }}</td> <!-- Mostrar el nombre del torneo -->
                        <td>
                            @if($reto->can_edit_delete)
                                <a href="{{ route('retos.edit', $reto->id_reto) }}" class="btn btn-warning">Editar</a>
                                <form action="{{ route('retos.destroy', $reto->id_reto) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este reto?')">Eliminar</button>
                                </form>
                            @else
                                <button class="btn btn-warning" disabled>Editar</button>
                                <button class="btn btn-danger" disabled>Eliminar</button>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Paginación -->
            <div class="d-flex justify-content-center">
                {{ $retos->links('pagination::bootstrap-5') }}
            </div>

        </main>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
@endsection
