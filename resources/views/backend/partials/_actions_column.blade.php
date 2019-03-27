<div class="d-inline-flex">
    <div class="mr-1">
        <a href="{{ route('admin.' . $resourceRouteId . '.show', ['id' => $resource->id]) }}" class="btn btn-sm btn-info" data-toggle="tooltip" title="{{ __('Show') }}">
            <i class="fa fa-eye"></i>
        </a>
    </div>
    <div class="mr-1">
        <a href="{{ route('admin.' . $resourceRouteId . '.edit', ['id' => $resource->id]) }}" class="btn btn-sm btn-warning" data-toggle="tooltip" title="{{ __('Edit') }}">
            <i class="fa fa-edit"></i>
        </a>
    </div>
    @if ($resource->canDelete())
        <form action="{{ route('admin.' . $resourceRouteId . '.destroy', $resource->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
            @method('DELETE')
            @csrf
            {{--<input class="btn btn-sm btn-danger" type="submit" value="<i class='fa fa-trash'></i>" data-toggle="tooltip" title="{{ __('Delete') }}" />--}}
            <button class="btn btn-sm btn-danger" type="submit" data-toggle="tooltip" title="{{ __('Delete') }}">
                <i class="fa fa-trash-alt"></i>
            </button>
        </form>
    @endif
</div>