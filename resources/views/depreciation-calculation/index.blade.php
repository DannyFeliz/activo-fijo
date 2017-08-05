@extends("layout")

@section("content")

    <h2>Depreciacion de Activos Fijos</h2>
    <hr>
    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th>Id</th>
                <th>Activo Fijo</th>
                <th>Depreciacion Acumulada</th>
                <th>Monto</th>
                <th>Mes de Proceso</th>
            </tr>
            </thead>
            <tbody>
            @foreach($fixed_assets as $fixed_asset)
                <tr>
                    <td>{{ $fixed_asset->id }}</td>
                    <td>{{ $fixed_asset->description }}</td>
                    <td>{{ $fixed_asset->accumulated_depreciation }}</td>
                    <td>{{ $fixed_asset->amount }}</td>
                    <td><?php 
$cicle_amount = $fixed_asset->amount / 12;
$cicles = 0;
                    $diff = 12 - (($fixed_asset->amount - $fixed_asset->accumulated_depreciation) / $cicle_amount);
                    echo round($diff);
                ?></td>
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


    <script>
        let id = location.search.replace(/\D/g, "");
        if (id) {
            alert("Se ha agregado el asiento contable exitosamente con el Id " + id);
        }
    </script>

@endsection
