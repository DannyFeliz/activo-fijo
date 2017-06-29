@extends("layout")

@section("content")
    <div>
        <h2>Editar Empleado</h2>
        <hr>
        <form method="POST" action="/empleados">
            {{ csrf_field() }}

            <div class="form-group">
                <label>Nombre</label>
                <input class="form-control" name="name" required>
            </div>

            <div class="form-group">
                <label>Cédula</label>
                <input class="form-control" name="identification_card" required>
            </div>

            <div class="form-group">
                <label>Departamento</label>
                <select class="form-control" name="department_id" required>
                    @foreach($departments as $department)
                        <option value="{{ $department->id }}">{{ $department->description }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="type" >Tipo de Persona</label>
                <select  id="type" name="type_person" class="form-control" required>
                    <option value="1">Física</option>
                    <option value="2">Jurídica</option>
                </select>
            </div>

            <div class="form-group">
                <label for="admision">Fecha de Ingreso</label>
                <input id="admision" type="date" name="admision_date" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="activo">Activo</label>
                <input required id="activo" type="radio" value="1" name="status" checked required>
                <br>
                <label for="inactivo">Inactivo</label>
                <input required id="inactivo" type="radio" value="0" name="status" required>
            </div>

            <button class="btn btn-default" type="submit">Guardar</button>
        </form>
    </div>
@endsection