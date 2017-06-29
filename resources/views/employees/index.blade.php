@extends("layout")

@section("content")

    <h2>Listado de Empleados</h2>
    <a href="/empleados/crear" class="btn btn-default">Agregar</a>
    <hr>
    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Cédula</th>
                <th>Departamento</th>
                <th>Tipo Persona</th>
                <th>Fecha de Ingreso</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($employees as $employee)
                <tr>
                    <td>{{ $employee->id }}</td>
                    <td>{{ $employee->name }}</td>
                    <td>{{ $employee->identification_card }}</td>
                    <td>{{ $employee->department }}</td>
                    <td>{{ $employee->type_person == "1" ? "Física" : 'Jurídica' }}</td>
                    <td>{{ $employee->admision_date }}</td>
                    <td>{{ $employee->status == "1" ? 'Activo' : "Inactivo" }}</td>
                    <td>
                        <a class="btn btn-default" href="/empleados/{{ $employee->id }}">Editar</a>
                        <form style="display: inline-block;" action="/empleados/{{ $employee->id }}" method="post" class="form">
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

