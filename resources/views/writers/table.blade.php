<table class="table table-responsive" id="writers-table">
    <thead>
        <tr>
            <th>Nombre</th>
        <th>Genero</th>
        <th>Edad</th>
        <th>Email</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($writers as $writer)
        <tr>
            <td>{!! $writer->nombre !!}</td>
            <td>{!! $writer->genero !!}</td>
            <td>{!! $writer->edad !!}</td>
            <td>{!! $writer->email !!}</td>
            <td>
                {!! Form::open(['route' => ['writers.destroy', $writer->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('writers.show', [$writer->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('writers.edit', [$writer->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>