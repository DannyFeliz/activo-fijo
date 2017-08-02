@extends("layout")

@section("content")

    <h2>Depreciacion de Activos Fijos</h2>
    <a href="/calculo-depreciacion/crear" class="btn btn-default">Agregar</a>
    <hr>
    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th>Id</th>
                <th>Activo Fijo</th>
                <th>Depreciacion Acumulada</th>
            </tr>
            </thead>
            <tbody>
            @foreach($fixed_assets as $fixed_asset)
                <tr>
                    <td>{{ $fixed_asset->id }}</td>
                    <td>{{ $fixed_asset->description }}</td>
                    <td>{{ $fixed_asset->accumulated_depreciation }}</td>
                    <td>
                        <form style="display: inline-block;" 
                              action="/calculo-depreciacion/depreciar/{{ $fixed_asset->id }}"
                              method="post"
                              class="form"
                        >
                            {{ csrf_field() }}
                            <button class="btn btn-danger">Depreciar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
