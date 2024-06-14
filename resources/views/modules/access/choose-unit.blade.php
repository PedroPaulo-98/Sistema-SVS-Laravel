@extends('layouts.access')

@section('content')
    <form action="choose" method="post" id="choose">
        @csrf
        <div class="mb-4">
            <select class="form-select" id="unit" name="unit" required>
                <option value="">Selecione a Unidade</option>
                @foreach($unit as $unit)
                    <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-2">
            <button type="submit" class="btn-login">Selecionar Unidade</button>
        </div>
    </form>

    <form action="logout" method="post">
        @csrf
        <div class="mb-1">
            <button type="submit" class="btn-logout">Sair</button>
        </div>
    </form>

    <script type="text/javascript">
        $(document).ready(function(){
            $('#unit').change(function(){
                const url = $('#choose').attr('data-service');
                unit = $(this).val();
                $.ajax({
                    url: url,
                    data: {
                        'unit': unit,
                    },
                    success: function(data){
                        $('#services').html(data);
                    }
                });
            });
        });
    </script>
@endsection