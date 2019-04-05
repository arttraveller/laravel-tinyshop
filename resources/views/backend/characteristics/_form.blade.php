<div class="row">

    <div class="col-6">
        <div class="card mb-3">
            <div class="card-header bg-primary text-white">{{ __('Characteristic') }}</div>
            <div class="card-body">

                {!! Form::text('name', __('Name'))->value($name) !!}

                {!! Form::select('type', __('Type'), $charTypes)->value($type) !!}

                {!! Form::select('required', __('Required'), $boolValues)->value($required) !!}

                <div class="mt-2">
                    {!! Form::text('default', __('Default value'))->value($default) !!}
                </div>

                {!! Form::textarea('variants', __('Variants'))->value($variants) !!}

                {!! Form::text('sort', __('Sort'))->value($sort) !!}

            </div>
        </div>

        {!! Form::submit(__('Save'))->primary() !!}

    </div>

</div>