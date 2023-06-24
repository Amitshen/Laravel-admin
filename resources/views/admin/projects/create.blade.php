@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header card-header-primary">
        <h4 class="card-title">
            {{ $title }}
        </h4>
    </div>

    <div class="card-body">
        <form action="{{ route("dashboard.products.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" value="{{isset($product)?$product->id:''}}" name="id">
            <div class="form-group mb-3 {{ $errors->has('name') ? 'has-error' : '' }}">
                <label class="form-label" for="name">{{ __('Product Name') }}*</label>
                <input type="text" id="name" name="name" placeholder="{{ __('Product Name') }}" class="form-control" value="{{ old('name', isset($product) ? $product->name : '') }}" required>
                @if($errors->has('name'))
                    <p class="help-block">
                        {{ $errors->first('name') }}
                    </p>
                @endif
            </div>
            <div class="form-group mb-3 {{ $errors->has('description') ? 'has-error' : '' }}">
                <label class="form-label" for="description">{{ __('Description') }}</label>
                <textarea id="description" name="description" placeholder="{{ __('Description') }}" class="form-control ckeditor">{{ old('description', isset($product) ? $product->description : '') }}</textarea>
                @if($errors->has('description'))
                    <p class="help-block">
                        {{ $errors->first('description') }}
                    </p>
                @endif
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="form-group mb-3 {{ $errors->has('user_id') ? 'has-error' : '' }}">
                        <label class="form-label" for="user_id">{{ __('Partner') }}*</label>
                        <select class="form-control" id="user_id" name="user_id" required>
                            <option value="">Select Partner</option>
                            @foreach($users as $k => $v)
                            <option value="{{$k}}" {{isset($product) && ($product->user_id == $k)?'selected':''}}>{{$v}}</option>
                            @endforeach
                        </select>
                        @if($errors->has('user_id'))
                            <p class="help-block">
                                {{ $errors->first('user_id') }}
                            </p>
                        @endif
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group mb-3 {{ $errors->has('brand_id') ? 'has-error' : '' }}">
                        <label class="form-label" for="brand_id">{{ __('Brand') }}</label>
                        <select class="form-control" id="brand_id" name="brand_id">
                            <option value="">Select Brand</option>
                            @foreach($brands as $k => $v)
                            <option value="{{$k}}" {{isset($product) && ($product->brand_id == $k)?'selected':''}}>{{$v}}</option>
                            @endforeach
                        </select>
                        @if($errors->has('brand_id'))
                            <p class="help-block">
                                {{ $errors->first('brand_id') }}
                            </p>
                        @endif
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group mb-3 {{ $errors->has('category_id') ? 'has-error' : '' }}">
                        <label class="form-label" for="category_id">{{ __('Category') }}*</label>
                        <select class="form-control change_category category" data-cat="child_category" id="category_id" name="category_id" required>
                            <option value="">Select Category</option>
                            @foreach($categories as $k => $v)
                            <option value="{{$k}}" {{isset($product) && ($product->category_id == $k)?'selected':''}}>{{$v}}</option>
                            @endforeach
                        </select>
                        @if($errors->has('category_id'))
                            <p class="help-block">
                                {{ $errors->first('category_id') }}
                            </p>
                        @endif
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group mb-3 {{ $errors->has('child_category_id') ? 'has-error' : '' }}">
                        <label class="form-label" for="child_category_id">{{ __('Child Category') }}*</label>
                        <select class="form-control change_category child_category" data-cat="sub_child_category" id="child_category_id" name="child_category_id" required>
                            <option value="">Select Category</option>
                            @isset($child_categories)
                            @foreach($child_categories as $k => $v)
                            <option value="{{$k}}" {{isset($product) && ($product->child_category_id == $k)?'selected':''}}>{{$v}}</option>
                            @endforeach
                            @endisset
                        </select>
                        @if($errors->has('child_category_id'))
                            <p class="help-block">
                                {{ $errors->first('child_category_id') }}
                            </p>
                        @endif
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group mb-3 {{ $errors->has('sub_child_category_id') ? 'has-error' : '' }}">
                        <label class="form-label" for="sub_child_category_id">{{ __('Sub Child Category') }}</label>
                        <select class="form-control sub_child_category" id="sub_child_category_id" name="sub_child_category_id">
                            <option value="">Select Category</option>
                            @isset($sub_child_categories)
                            @foreach($sub_child_categories as $k => $v)
                            <option value="{{$k}}" {{isset($product) && ($product->sub_child_category_id == $k)?'selected':''}}>{{$v}}</option>
                            @endforeach
                            @endisset
                        </select>
                        @if($errors->has('sub_child_category_id'))
                            <p class="help-block">
                                {{ $errors->first('sub_child_category_id') }}
                            </p>
                        @endif
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group mb-3 {{ $errors->has('price') ? 'has-error' : '' }}">
                        <label class="form-label" for="price">{{ __('Price') }}</label>
                        <input type="number" id="price" name="price" min="0" placeholder="{{ __('Price') }}" class="form-control" value="{{ old('price', isset($product) ? $product->price : '') }}" required>
                        @if($errors->has('price'))
                            <p class="help-block">
                                {{ $errors->first('price') }}
                            </p>
                        @endif
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group mb-3 {{ $errors->has('price_type') ? 'has-error' : '' }}">
                        <label class="form-label" for="price_type">{{ __('Price Unit') }}</label>
                        <input type="text" id="price_type" name="price_type" placeholder="{{ __('Per Kg') }}" class="form-control" value="{{ old('price_type', isset($product) ? $product->price_type : '') }}" required>
                        @if($errors->has('price_type'))
                            <p class="help-block">
                                {{ $errors->first('price_type') }}
                            </p>
                        @endif
                    </div>
                </div>
            </div>
            <hr>
            <h5 class="mt-4">Attributes <span class="new-attribute-value btn rounded-pill btn-sm btn-icon btn-outline-primary" style="float: right;"><i class='bx bx-plus'></i></span></h5>
            @if($edit)
            @foreach ($attributesData as $key_count => $attributeData)
            <div class="row product_attributes">
                <div class="col-6">
                    <div class="form-group mb-1">
                        @if($key_count == 0)
                        <label class="form-label">Attribute Name</label>
                        @endif
                        <select name="attribute[]" class="form-control product_attribute" id="attribute" required>
                            <option value="">Select Attribute</option>
                            @foreach ($attributes as $attribute)
                            <option value="{{$attribute->id}}" {{($attributeData['id'] == $attribute->id)?'selected':''}}>{{$attribute->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-5">
                    <div class="form-group mb-1">
                        @if($key_count == 0)
                        <label class="form-label">Attribute Value</label>
                        @endif
                        <select name="attribute_value[]" class="form-control product_attribute_values" id="attribute_value" required>
                            <option value="">Select Value</option>
                            @foreach ($attributeData['attribute_value'] as $attribute_value)
                            <option value="{{$attribute_value['id']}}" {{($attribute_value['selected'])?'selected':''}}>{{$attribute_value['name']}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                @if($key_count > 0)
                    <div class="col-1"><div class="form-group mb-3"><span class="remove_attribute btn rounded-pill btn-sm btn-icon btn-outline-danger mt-1"><i class="bx bx-minus"></i></span></div></div>
                @endif
            </div>
            @endforeach
            
            @else
            <div class="row product_attributes">
                <div class="col-6">
                    <div class="form-group mb-1">
                        <label class="form-label">Attribute Name</label>
                        <select name="attribute[]" class="form-control product_attribute" id="attribute" required>
                            <option value="">Select Attribute</option>
                            @foreach ($attributes as $attribute)
                            <option value="{{$attribute->id}}">{{$attribute->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-5">
                    <div class="form-group mb-1">
                        <label class="form-label">Attribute Value</label>
                        <select name="attribute_value[]" class="form-control product_attribute_values" id="attribute_value" required>
                            <option value=""></option>
                        </select>
                    </div>
                </div>
            </div>
            @endif
            <div class="append_attributes"></div>

            <hr>
            <h5 class="mt-4">Other Details <span class="new-attribute btn rounded-pill btn-sm btn-icon btn-outline-primary" style="float: right;"><i class='bx bx-plus'></i></span></h5>
            <div class="row">
                <div class="col-6">
                    <div class="form-group mb-1">
                        <label class="form-label">Details Name</label>
                    </div>
                </div>
                <div class="col-5">
                    <div class="form-group mb-1">
                        <label class="form-label">Details Value</label>
                    </div>
                </div>
            </div>
            <div class="append_to">
                @if(!isset($product->attributes))
                <div class="row">
                    <div class="col-6">
                        <div class="form-group mb-3">
                            <input type="text" name="attr_key[]" placeholder="" class="form-control" value="" required>
                        </div>
                    </div>
                    <div class="col-5">
                        <div class="form-group mb-3">
                            <input type="text" name="attr_value[]" placeholder="" class="form-control" value="" required>
                        </div>
                    </div>
                    <div class="col-1">
                    </div>
                </div>
                @else
                @php $i = 0; @endphp
                @foreach(json_decode($product->attributes) as $k => $v)
                <div class="row remove-this">
                    <div class="col-6">
                        <div class="form-group mb-3">
                            <input type="text" name="attr_key[]" placeholder="" class="form-control" value="{{$k}}" required>
                        </div>
                    </div>
                    <div class="col-5">
                        <div class="form-group mb-3">
                            <input type="text" name="attr_value[]" placeholder="" class="form-control" value="{{$v}}" required>
                        </div>
                    </div>
                    <div class="col-1">
                        @if($i != 0)
                        <div class="form-group mb-3">
                            <span class="remove-attribute btn rounded-pill btn-sm btn-icon btn-outline-danger mt-1">
                                <i class="bx bx-minus"></i>
                            </span>
                        </div>
                        @endif
                    </div>
                </div>
                @php $i++; @endphp
                @endforeach
                @endif
            </div>
            {{-- <hr>
            <h5 class="mt-4">Additional Information</h5> --}}
            <hr>
            <h5 class="mt-4">Product Images</h5>
            <div class="form-group mb-3 {{ $errors->has('image') ? 'has-error' : '' }}">
                <label class="form-label" for="image">{{ __('Product Image') }}</label>
                <input type="file" id="image" name="image" class="form-control" accept=".jpg,.png,.jpeg">
                @if($errors->has('image'))
                    <p class="help-block">
                        {{ $errors->first('image') }}
                    </p>
                @endif
                @isset($product)<img src="{{$product->image}}" width="120" height="120" class="imageimg-thumbnail rounded mt-2">@endif
            </div>

            <div class="form-group mb-3 {{ $errors->has('gallery_images') ? 'has-error' : '' }}">
                <label class="form-label" for="gallery_images">{{ __('Gallery Images') }}</label>
                <input type="file" id="gallery_images" name="gallery_images[]" class="form-control" accept=".jpg,.png,.jpeg" multiple>
                @if($errors->has('gallery_images'))
                    <p class="help-block">
                        {{ $errors->first('gallery_images') }}
                    </p>
                @endif
                @isset($product->gallery_images)
                    @foreach(json_decode($product->gallery_images) as $gallery_images)
                    <img src="{{$gallery_images}}" width="120" height="120" class="imageimg-thumbnail rounded mt-2">
                    @endforeach
                @endif
            </div>

            <div class="form-group mb-3 {{ $errors->has('status') ? 'has-error' : '' }}">
                <label class="form-label" for="status">{{ __('Status') }}</label>
                <select class="form-control" id="status" name="status">
                    <option value="1" {{isset($product) && $product->status?'selected':''}}>Publish</option>
                    <option value="0" {{isset($product) && !$product->status?'selected':''}}>Pending</option>
                </select>
                @if($errors->has('status'))
                    <p class="help-block">
                        {{ $errors->first('status') }}
                    </p>
                @endif
            </div>

            <div>
                <input class="btn btn-success" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>
@endsection
@section('scripts')
@parent
<style>
    .product_attributes {
        margin-bottom: 10px;
    }
</style>
<script>
    $(document).ready(function () {
        $('.change_category').on('change', function () {
            var cls = $(this).data("cat");
            var cat_id = this.value;
            $.ajax({
                url: "{{route('dashboard.fetch-category')}}",
                type: "POST",
                data: {
                    cat_id: cat_id,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (result) {
                    $('.'+cls).html('<option value="">Select Category</option>');
                    $.each(result.categories, function (key, value) {
                        $('.'+cls).append('<option value="' + value.id + '">' + value.name + '</option>');
                    });
                }
            });
        });
        
        $('.new-attribute').on('click', function () {
            var html = '<div class="row remove-this"><div class="col-6"><div class="form-group mb-3"><input type="text" name="attr_key[]" placeholder="" class="form-control" value="" required></div></div><div class="col-5"><div class="form-group mb-3"><input type="text" name="attr_value[]" placeholder="" class="form-control" value="" required></div></div><div class="col-1"><div class="form-group mb-3"><span class="remove-attribute btn rounded-pill btn-sm btn-icon btn-outline-danger mt-1"><i class="bx bx-minus"></i></span></div></div></div>';
            $(".append_to").append(html);
        });

        $(document).on("click",".remove-attribute",function() {
            $(this).closest('.remove-this').remove();
        });

        $(document).on('change', '.product_attribute', function () {
            var _this = $(this);
            var attribute_id = _this.val();

            console.log(attribute_id);
            $.ajax({
                url: "{{route('dashboard.get-attribute-values')}}",
                type: "POST",
                data: {
                    attribute_id: attribute_id,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (result) {
                    _this.closest('.product_attributes').find('.product_attribute_values').html('<option value="">Select Value</option>');
                    $.each(result.attribute_values, function (key, value) {
                        _this.closest('.product_attributes').find('.product_attribute_values').append('<option value="' + key + '">' + value + '</option>');
                    });
                }
            });
        });

        $('.new-attribute-value').on('click', function () {
            var html = '<div class="row product_attributes"><div class="col-6"><div class="form-group mb-1"><select name="attribute[]" class="form-control product_attribute" id="attribute" required=""><option value="">Select Attribute</option>';
                @foreach ($attributes as $attribute)
                html+= '<option value="{{$attribute->id}}">{{$attribute->name}}</option>';
                @endforeach
                html+= '</select></div></div><div class="col-5"><div class="form-group mb-1"><select name="attribute_value[]" class="form-control product_attribute_values" id="attribute_value" required><option value="">Value</option></select></div></div><div class="col-1"><div class="form-group mb-3"><span class="remove_attribute btn rounded-pill btn-sm btn-icon btn-outline-danger mt-1"><i class="bx bx-minus"></i></span></div></div></div>';
            $(".append_attributes").append(html);
        });

        $(document).on("click",".remove_attribute",function() {
            $(this).closest('.product_attributes').remove();
        });
    });
</script>
@endsection
