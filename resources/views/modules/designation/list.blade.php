
<table class="table table-responsive table-striped table-secondary">
    <thead>
        <th width=5%>#</th>
        <th width=86%>Usuário</th>
        <th width=9%>Ações</th>
    </thead>
    
    <tbody>
        @foreach($data as $data)
            <tr class="align-middle">
                <td>{{ $data->id }} </td>
                <td>{{ $data->name }} </td>
                <td>
                    <div class="row">
                        <form class="px-0" action="delete/{{ $unit }}/{{ $data->id }}" method="post">
                            @csrf
                            @method('PUT')
                            <a href="{{ $unit }}/{{ $data->id }}" class="btn btn-info" title="Editar Designação">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                            
                            <button type="submit" class="btn btn-danger" id="delete" name="delete" value="{{ $data->id }}" title="Deletar Designação">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach 
    </tbody>
</table>