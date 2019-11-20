<div class="row">

    <div class="col-6">
        <div class="card mb-3">
            <div class="card-header bg-primary text-white">{{ __('Product') }}</div>
            <div class="card-body">

                {!! Form::text('code', __('Code'))->value($code) !!}

                {!! Form::text('name', __('Name'))->value($name) !!}

                {!! Form::textarea('description', __('Description'))->value($description) !!}

                {!! Form::select('status', __('Status'), $allStatuses)->value($status) !!}

                {!! Form::select('brand_id', __('Brand'), array_replace(['' => ''], $allBrands))->value($brandId) !!}


                <div class="row">

                    <div class="col-9">
                        <div class="form-group">
                            <label for="price" class="col-form-label"><strong> {{ __('Current price') }} </strong></label>
                            <input id="price" type="number" min="0.00"  step="0.01" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" name="price" value="{{ old('price') }}" />
                            @if ($errors->has('price'))
                                <span class="invalid-feedback">{{ $errors->first('price') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="col-3">
                        <div class="form-group">
                            <label for="old_price" class="col-form-label">{{ __('Old price') }}</label>
                            <input id="old_price" type="number" min="0.00"  step="0.01" class="form-control{{ $errors->has('old_price') ? ' is-invalid' : '' }}" name="old_price" value="{{ old('old_price') }}" />
                            @if ($errors->has('old_price'))
                                <span class="invalid-feedback">{{ $errors->first('old_price') }}</span>
                            @endif
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

    <div class="col-6">

        <div class="row">
            <div class="col-12">
                <div class="card mb-3">
                    <div class="card-header bg-secondary text-white">{{ __('Categories') }}</div>
                    <div class="card-body">

                        {!! Form::select('categories', __('Categories'), array_replace(['' => ''], $allCategories))->multiple()->value($currentCategories) !!}

                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="card mb-3">
                    <div class="card-header bg-secondary text-white">{{ __('Tags') }}</div>
                    <div class="card-body">

                        {!! Form::select('exist_tags', __('Tags'), $allTags)->multiple()->value($currentTags) !!}

                        {!! Form::textarea('new_tags', __('New')) !!}

                    </div>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-12">
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

    </div>
</div>


<div class="row">
    <div class="col-12">

        {!! Form::submit(__('Save'))->primary() !!}

    </div>
</div>
