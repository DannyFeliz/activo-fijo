@extends("layout")

@section("content")
    <div>
        <h2>Editar Tipo de Activo</h2>
        <hr>
        <form method="POST" action="/tipos-activos/{{ $typesAssets->id }}">
            {{ csrf_field() }}
            {{ method_field("PUT") }}

            <div class="form-group">
                <label>Descripción</label>
                <textarea required class="form-control" cols="2" rows="2" name="description">{{ $typesAssets->description }}</textarea>
            </div>

            <div class="form-group">
               <label>Cuenta Contable Compra</label>
                <input required class="form-control" name="accounting_accounts_purchase" value="{{ $typesAssets->accounting_accounts_purchase }}">
            </div>

            <div class="form-group">
                <label>Cuenta Contable Depreciación</label>
                <input required class="form-control" name="accounting_accounts_depreciation" value="{{ $typesAssets->accounting_accounts_depreciation }}">
            </div>

            <button class="btn btn-default" type="submit">Editar</button>
        </form>
    </div>
@endsection