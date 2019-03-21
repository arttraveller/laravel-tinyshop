<div class="d-inline-flex">
    <div class="mr-1">
        <a href="{{ route('admin.' . $resourceRouteId . '.show', ['id' => $resource->id]) }}" class="btn btn-sm btn-info" data-toggle="tooltip" title="{{ __('Show') }}">{{ __('Show') }}</a>
    </div>
    <div class="mr-1">
        <a href="{{ route('admin.' . $resourceRouteId . '.edit', ['id' => $resource->id]) }}" class="btn btn-sm btn-warning" data-toggle="tooltip" title="{{ __('Edit') }}">{{ __('Edit') }}</a>
    </div>
    <form action="{{ route('admin.' . $resourceRouteId . '.destroy', $resource->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
        @method('DELETE')
        @csrf
        <input class="btn btn-sm btn-danger" type="submit" value="{{ __('Delete') }}" data-toggle="tooltip" title="{{ __('Delete') }}" />
    </form>
</div>