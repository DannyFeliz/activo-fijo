@extends("layout")

@section("content")

    <h2>Listado de Tipos de Activos</h2>
    <a href="/tipos-activos/crear" class="btn btn-default">Agregar</a>
    <hr>
    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th>Id</th>
                <th>Descripción</th>
                <th>Cuenta Contable Compra</th>
                <th>Cuenta Contable Depreciación</th>
            </tr>
            </thead>
            <tbody>
            @foreach($typesAssets as $typesAsset)
                <tr>
                    <td>{{ $typesAsset->id }}</td>
                    <td>{{ $typesAsset->description }}</td>
                    <td>{{ $typesAsset->accounting_accounts_purchase }}</td>
                    <td>{{ $typesAsset->accounting_accounts_depreciation }}</td>
                    <td>
                        <a class="btn btn-default" href="/tipos-activos/{{ $typesAsset->id }}">Editar</a>
                        <form style="display: inline-block;" action="/tipos-activos/{{ $typesAsset->id }}" method="post" class="form">
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

