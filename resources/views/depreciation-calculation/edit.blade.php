@extends("layout")

@section("content")
    <div>
        <h2>Crear Calculo de Depreciacion</h2>
        <hr>
        <form method="POST" action="/calculo-depreciaciones/{{$depreciationCalculation->id}}">
            {{ csrf_field() }}
            {{ method_field("PUT") }}

            <div class="form-group">
                <label>Cuenta Compra</label>
                <input class="form-control" name="parchuse_account" required>
            </div>

            <div class="form-group">
                <label>Cuenta Depreciacion</label>
                <input class="form-control" name="depreciation_account" required>
            </div>

            <div class="form-group">
                <label>Activo Fijo</label>
                <select class="form-control" name="fixed_asset_id" required>
                    @foreach($fixed_assets as $fixed_asset)
                        <option {{ $depreciationCalculation->fixed_asset_id == $fixed_asset->id ? 'selected' : '' }} 
                    @endforeach
                </select>
            </div>

            <button class="btn btn-default" type="submit">Calcular</button>
        </form>
    </div>
@endsection
