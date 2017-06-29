@extends("layout")

@section("content")
    <div>
        <h2>Editar Empleado</h2>
        <hr>
        <form method="POST" action="/empleados/{{ $data["employee"]->id }}">
            {{ csrf_field() }}
            {{ method_field("PUT") }}

            <div class="form-group">
                <label>Nombre</label>
                <input class="form-control" name="name" value="{{  $data["employee"]->name }}" required>
            </div>

            <div class="form-group">
                <label>Cédula</label>
                <input class="form-control" name="identification_card" value="{{  $data["employee"]->identification_card }}" required>
            </div>

            <div class="form-group">
                <label>Departamento</label>
                <select class="form-control" name="department_id" required>
                    @foreach($data["departments"] as $department)
                        <option {{ $data["employee"]->department_id == $department->id ? 'selected' : '' }}  value="{{ $department->id }}">{{ $department->description }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="type" >Tipo de Persona</label>
                <select  id="type" name="type_person" class="form-control" required>
                    <option {{ $data["employee"]->type_person == '1' ? 'selected' : '' }} value="1">Física</option>
                    <option {{ $data["employee"]->type_person == '2' ? 'selected' : '' }} value="2">Jurídica</option>
                </select>
            </div>

            <div class="form-group">
                <label for="admision">Fecha de Ingreso</label>
                <input id="admision" type="date" name="admision_date" class="form-control" value="{{ $data["employee"]->admision_date }}" required>
            </div>

            <div class="form-group">
                <label for="activo">Activo</label>
                <input required id="activo" type="radio" required value="1" name="status" {{ $data["employee"]->status == '1' ? 'checked' : ''}}>
                <br>
                <label for="inactivo">Inactivo</label>
                <input required id="inactivo" type="radio" required value="0" name="status" {{ $data["employee"]->status == '0' ? 'checked' : ''}}>
            </div>

            <button class="btn btn-default" type="submit">Editar</button>
        </form>
    </div>
@endsection