@extends("layout")

@section("content")
    <div>
        <h2>Editar Activo fijo</h2>
        <hr>
        <form method="POST" action="/activos-fijos/{{$fixed_asset->id}}">
            {{ csrf_field() }}
            {{ method_field("PUT") }}

            <div class="form-group">
                <label>Descripcion</label>
                <input class="form-control" name="description" value="{{ $fixed_asset->description }}" required>
            </div>

            <div class="form-group">
                <label>Departamento</label>
                <select class="form-control" name="department_id" required>
                    @foreach($departments as $department)
                        <option {{ $fixed_asset->department_id == $department->id ? 'selected' : '' }} 
                         value="{{ $department->id }}">{{ $department->description }}
                         </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Tipo de activo</label>
                <select class="form-control" name="type_asset_id" required>
                    @foreach($asset_types as $asset_type)
                        <option {{ $fixed_asset->type_asset_id == $asset_type->id ? 'selected' : '' }} 
                         value="{{ $asset_type->id }}">{{ $asset_type->description }}
                         </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Valor de compra</label>
                <input class="form-control" name="amount" value="{{ $fixed_asset->amount }}" required>
            </div>

            <button class="btn btn-default" type="submit">Guardar</button>
        </form>
    </div>
@endsection