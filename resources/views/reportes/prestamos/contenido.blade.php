<div class="row">
    <div class="col-12">
        <table class="table table-primaria d-none d-lg-table text-center align-center">
            <thead class="table-head fw-bold">
                
                <th>Nombre</th>
                <th>Cuantos</th>
                <th>Opciones</th>
                
            </thead>
            <tbody id="">
                @foreach ($listas as $lista)
                <tr class="d-none d-lg-table-row col-12">
                    

                    <td class="align-center col-2">{{ $lista->nombre }}</td>

                    <td class="align-center col-3">{{ $lista->cuantos }} </td>

                    <td class="align-center col-2">
                        <a href="{{ route('detalle_carrerasP', ['idca' => $lista->idca]) }}"
                            class="btn btn-primario text-white btn-sm d-block mx-auto w-75">Detalle</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
