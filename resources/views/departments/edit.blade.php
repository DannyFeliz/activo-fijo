@extends("layout")

@section("content")
    <div>
        <h2>Editar Departamento</h2>
        <hr>
        <form method="POST" action="/departamentos/{{ $department->id }}">
            {{ csrf_field() }}
            {{ method_field("PUT") }}

            <div class="form-group">
                <label>Descripción</label>
                <textarea required class="form-control" cols="2" rows="2" name="description">{{ $department->description }}</textarea>
            </div>

            <div class="form-group">
                <label for="activo">Activo</label>
                <input required id="activo" type="radio" value="1" name="status" {{ $department->status ? 'checked' : ''}}>
                <br>
                <label for="inactivo">Inactivo</label>
                <input required id="inactivo" type="radio" value="0" name="status" {{ $department->status ? '' : 'checked'}}>
            </div>

            <button class="btn btn-default" type="submit">Editar</button>
        </form>
    </div>
@endsection