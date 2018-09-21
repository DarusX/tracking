<div class="card bg-warning">
    <div class="card-header">
        {{$status->status}}
    </div>
    <ul class="list-group">
        @foreach($status->jobs as $job)
        <li class="list-group-item">
            <div class="d-flex justify-content-between align-items-center">
                <p class="mb-0">{{"{$job->brand} - {$job->model}"}}</p>
                <span class="badge badge-dark">{{$job->updated_at->diffForHumans()}}</span>
            </div>
            
            <p class="mb-0">{{$job->repairer->full_name}}</p>
            <a href="{{route('jobs.edit', $job)}}" class="btn btn-sm btn-dark"><i class="fas fa-pen"></i></a>
            <a href="{{route('jobs.show', $job)}}" class="btn btn-sm btn-dark"><i class="fas fa-plus"></i></a>
            <a href="{{route('jobs.destroy', $job)}}" class="btn btn-sm btn-dark destroy"><i class="fas fa-trash"></i></a>
        </li>
        @endforeach
    </ul>
</div>