@extends("layout")

@section("content")

    <h2>Listado de Activos Fijos</h2>
    <a href="/calculo-depreciacion/crear" class="btn btn-default">Agregar</a>
    <hr>
    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th>Id</th>
                <th>Año Proceso</th>
                <th>Mes Proceso</th>
                <th>Cuenta Compra</th>
                <th>Cuenta Depreciacion</th>
            </tr>
            </thead>
            <tbody>
            @foreach($depreciationCalculations as $depreciationCalculation)
                <tr>
                    <td>{{ $depreciationCalculation->id }}</td>
                    <td>{{ $depreciationCalculation->process_year }}</td>
                    <td>{{ $depreciationCalculation->process_month }}</td>
                    <td>{{ $depreciationCalculation->parchuse_account }}</td>
                    <td>{{ $depreciationCalculation->depreciation_account }}</td>
                    <td>
                        <a class="btn btn-default" href="/calculo-depreciacion/{{ $depreciationCalculation->id }}">Editar</a>
                        <form style="display: inline-block;" action="/calculo-depreciacion/{{ $depreciationCalculation->id }}" method="post" class="form">
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
