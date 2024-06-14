
<table class="table table-responsive table-striped table-secondary">
    <thead>
        <th width=6%>#</th>
        <th width=85%>Modulo</th>
        <th width=9%>Ações</th>
    </thead>
    
    <tbody>
        @foreach($data as $data)
            <tr class="align-middle">
                <td>{{ $data->id }}</td>
                <td>{{ $data->title }}</td>
                <td>
                    <div class="row">
                        <form class="px-0" action="delete/{{ $profile->id }}/{{ $data->id }}" method="post">
                            @csrf
                            @method('PUT')
                            <a href="{{ $profile->id }}/{{ $data->id }}" class="btn btn-info" title="Editar Permissão">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                            
                            <button type="submit" class="btn btn-danger" title="Deletar Permissão">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>