<div class="row">

    <div class="col-6">
        <div class="card mb-3">
            <div class="card-header bg-primary text-white">{{ __('Brand') }}</div>
            <div class="card-body">

                {!! Form::text('name', __('Name'))->value($name) !!}

                {!! Form::text('slug', __('Slug'))->value($slug) !!}

            </div>
        </div>

        {!! Form::submit(__('Save'))->primary() !!}

    </div>

    <div class="col-6">
        <div class="card mb-3">
            <div class="card-header bg-secondary text-white">SEO</div>
            <div class="card-body">

                {!! Form::text('meta_title', __('Title'))->value($metaTitle) !!}

                {!! Form::text('meta_description', __('Description'))->value($metaDescription) !!}

                {!! Form::text('meta_keywords', __('Keywords'))->value($metaKeywords) !!}

            </div>
        </div>
    </div>

</div>