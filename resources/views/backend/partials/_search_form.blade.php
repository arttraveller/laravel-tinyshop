<form action="?" method="GET">
    <div class="input-group">
        <input class="form-control form-control-no-border" name="search" placeholder="{{ __('Search') }}" type="text" value="{{ request('search') }}" />
        <div class="input-group-append">
            <button class="btn btn-secondary" type="submit">
                <i class="fa fa-search"></i>
            </button>
        </div>
    </div>
</form>
