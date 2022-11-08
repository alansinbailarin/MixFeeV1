<div class="card">
    @if (session('deleted'))
    <div class="alert alert-danger" role="alert">
        <strong>{{ session('deleted') }}</strong>
    </div>
    
    @endif
    <div class="card-header">
        <input wire:model="search" placeholder="Filtro de tus trabajos publicados" class="form-control">
    </div>
    @if ($jobs->count())
        
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titulo</th>
                    <th colspan="2"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jobs as $job)
                    <tr>
                        <td>{{$job->id}}</td>
                        <td>{{$job->title}}</td>
                        <td width="10px"><a class="btn btn-info btn-sm" href="{{route('admin.jobs.show', $job)}}">Ver</a></td>

                        <td width="10px">
                            <a href="{{route('admin.jobs.edit', $job)}}" class="btn btn-primary btn-sm">Editar</a>
                        </td>
                        <td width="10px">
                            <form action="{{route('admin.jobs.destroy', $job)}}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="card-footer">
        {{$jobs->links()}}
    </div>
    @else
        <div class="card-body">
            <strong>No se encontró ningun registro</strong>
        </div>
    @endif
</div>
