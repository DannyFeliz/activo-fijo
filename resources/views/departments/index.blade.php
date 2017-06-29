@extends("layout")

@section("content")

    <h2>Listado de Departamentos</h2>
    <a href="/departamentos/crear" class="btn btn-default">Agregar</a>
    <hr>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Descripción</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($departments as $department)
                <tr>
                    <td>{{ $department->id }}</td>
                    <td>{{ $department->description }}</td>
                    <td>{{ $department->status ? "Activo" : "Inactivo"}}</td>
                    <td>
                        <a class="btn btn-default" href="/departamentos/{{ $department->id }}">Editar</a>
                        <form style="display: inline-block;" action="/departamentos/{{ $department->id }}" method="post" class="form">
                            {{ csrf_field() }}
                            {{ method_field("delete") }}
                            <button class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection

