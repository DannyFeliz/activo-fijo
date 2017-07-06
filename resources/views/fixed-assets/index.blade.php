@extends("layout")

@section("content")

    <h2>Listado de Activos Fijos</h2>
    <a href="/activos-fijos/crear" class="btn btn-default">Agregar</a>
    <hr>
    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th>Id</th>
                <th>Descripcion</th>
                <th>Cantidad</th>
            </tr>
            </thead>
            <tbody>
            @foreach($fixed_assets as $fixed_asset)
                <tr>
                    <td>{{ $fixed_asset->id }}</td>
                    <td>{{ $fixed_asset->description }}</td>
                    <td>{{ $fixed_asset->amount }}</td>
                    <td>
                        <a class="btn btn-default" href="/activos-fijos/{{ $fixed_asset->id }}">Editar</a>
                        <form style="display: inline-block;" action="/activos-fijos/{{ $fixed_asset->id }}" method="post" class="form">
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