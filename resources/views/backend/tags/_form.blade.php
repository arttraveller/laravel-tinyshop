<div class="row">

    <div class="col-6">
        <div class="card mb-3">
            <div class="card-header bg-primary text-white">{{ __('Tag') }}</div>
            <div class="card-body">

                {!! Form::text('name', __('Name'))->value($name) !!}

                {!! Form::text('slug', __('Slug'))->value($slug) !!}

            </div>
        </div>

        {!! Form::submit(__('Save'))->primary() !!}

    </div>

</div>