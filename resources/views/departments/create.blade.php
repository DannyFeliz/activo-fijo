@extends("layout")

@section("content")
    <div>
        <h2>Agregar Departamento</h2>
        <hr>
        <form method="POST" action="/departamentos">
            {{ csrf_field() }}

            <div class="form-group">
                <label>Descripción</label>
                <textarea required class="form-control" cols="2" rows="2" name="description"></textarea>
            </div>

            <div class="form-group">
                <label for="activo">Activo</label>
                <input required id="activo" type="radio" value="1" name="status">
                <br>
                <label for="inactivo">Inactivo</label>
                <input required id="inactivo" type="radio" value="0" name="status">
            </div>

            <button class="btn btn-default" type="submit">Guardar</button>
        </form>
    </div>
@endsection