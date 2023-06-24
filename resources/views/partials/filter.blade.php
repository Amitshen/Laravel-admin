<div class="col-xl-3 col-lg-3 col-md-12 col-sm-12">
    <div class="bg-white rounded mb-4">

        <div class="sidebar_header d-flex align-items-center justify-content-between px-4 py-3 br-bottom">
            <h4 class="ft-medium fs-lg mb-0">Search Filter</h4>
            <div class="ssh-header">
                <a href="{{route('listings')}}" class="clear_all ft-medium text-muted">Clear All</a>
                <a href="#search_open" data-bs-toggle="collapse" aria-expanded="false" role="button"
                    class="collapsed _filter-ico ml-2"><i class="lni lni-text-align-right"></i></a>
            </div>
        </div>

        <!-- Find New Property -->
        <div class="sidebar-widgets collapse miz_show" id="search_open" data-bs-parent="#search_open">
            <div class="search-inner">

                <div class="side-filter-box">
                    <div class="side-filter-box-body">
                        <form action="{{route('listings')}}" method="get">
                            {{-- @csrf --}}
                            <!-- Price Range -->
                            <div class="inner_widget_link">
                                <div class="btn-group d-flex justify-content-around price-btn-457">
                                </div>
                                <div class="price-input">
                                    <div class="field">
                                        <span>Min</span>
                                        <input type="number" class="input-min" onchange="this.form.submit()" name="min_price" value="{{ $request->input('min_price') ? $request->input('min_price') : 100 }}">
                                    </div>
                                    <div class="separator">-</div>
                                    <div class="field">
                                        <span>Max</span>
                                        <input type="number" class="input-max" onchange="this.form.submit()" name="max_price" value="{{ $request->input('max_price') ? $request->input('max_price') : 1200 }}">
                                    </div>
                                </div>
                                <div class="slider">
                                    <div class="progress"></div>
                                </div>
                                <div class="range-input">
                                    <input type="range" class="range-min" onchange="this.form.submit()" min="0" max="10000" value="{{ $request->input('min_price') ? $request->input('min_price') : 100 }}" step="100">
                                    <input type="range" class="range-max" onchange="this.form.submit()" min="0" max="10000" value="{{ $request->input('max_price') ? $request->input('max_price') : 1200 }}" step="100">
                                </div>
                            </div>

                            <!-- Suggested -->
                            {{-- <div class="inner_widget_link">
                                <h6 class="ft-medium">Suggested</h6>
                                <ul class="no-ul-list filter-list">
                                    <li>
                                        <input id="a1" class="checkbox-custom" name="iPhone" type="checkbox">
                                        <label for="a1" class="checkbox-custom-label">iPhone</label>
                                    </li>
                                    <li>
                                        <input id="a2" class="checkbox-custom" name="Oneplus" type="checkbox">
                                        <label for="a2" class="checkbox-custom-label">Oneplus</label>
                                    </li>
                                    <li>
                                        <input id="a3" class="checkbox-custom" name="Xiomi" type="checkbox">
                                        <label for="a3" class="checkbox-custom-label">Xiomi</label>
                                    </li>
                                    <li>
                                        <input id="a4" class="checkbox-custom" name="Huwai" type="checkbox">
                                        <label for="a4" class="checkbox-custom-label">Huwai</label>
                                    </li>
                                    <li>
                                        <input id="a5" class="checkbox-custom" name="rog" type="checkbox">
                                        <label for="a5" class="checkbox-custom-label">ROG</label>
                                    </li>

                                </ul>
                            </div> --}}

                            <!-- Features -->
                            <div class="inner_widget_link">
                                <h6 class="ft-medium">Category</h6>
                                <ul class="no-ul-list filter-list">
                                    @foreach($categories as $cat_key => $category)
                                    <li>
                                        {{-- onChange="this.form.submit()" --}}
                                        <input id="{{$category->slug}}" class="checkbox-custom" onChange="this.form.submit()" name="categories" value="{{$category->slug}}" type="checkbox" {{ $request->input('categories') == $category->slug ? 'checked' : '' }}>
                                        <label for="{{$category->slug}}" class="checkbox-custom-label">{{$category->name}}</label>
                                    </li>
                                    @endforeach
                                    {{-- <li>
                                        <a class="ft-bold d14ixh" href="javascript:void(0);">See More</a>
                                    </li> --}}
                                </ul>
                            </div>

                            <!-- Brands -->
                            <div class="inner_widget_link">
                                <h6 class="ft-medium">Brands</h6>
                                <ul class="no-ul-list filter-list">
                                    @foreach ($brands as $brand)
                                    <li>
                                        <input id="{{$brand->slug}}" class="checkbox-custom" onChange="this.form.submit()" name="brands" value="{{$brand->slug}}" type="checkbox" {{ $request->input('brands') == $brand->slug ? 'checked' : '' }}>
                                        <label for="{{$brand->slug}}" class="checkbox-custom-label">{{$brand->name}}</label>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>

                            <!-- Bird's-eye View -->
                            {{-- <div class="inner_widget_link">
                                <h6 class="ft-medium">Bird's-eye View</h6>
                                <ul class="no-ul-list filter-list">
                                    <li>
                                        <input id="c1" class="checkbox-custom" name="blc" type="checkbox">
                                        <label for="c1" class="checkbox-custom-label">Within 4 blocks</label>
                                    </li>
                                    <li>
                                        <input id="c2" class="checkbox-custom" name="1km" type="checkbox">
                                        <label for="c2" class="checkbox-custom-label">Walking (1 mi.)</label>
                                    </li>
                                    <li>
                                        <input id="c3" class="checkbox-custom" name="2km" type="checkbox">
                                        <label for="c3" class="checkbox-custom-label">Biking (2 mi.)</label>
                                    </li>
                                    <li>
                                        <input id="c4" class="checkbox-custom" name="5km" type="checkbox">
                                        <label for="c4" class="checkbox-custom-label">Driving (5 mi.)</label>
                                    </li>
                                    <li>
                                        <input id="c5" class="checkbox-custom" name="10km" type="checkbox">
                                        <label for="c5" class="checkbox-custom-label">Driving (10 mi.)</label>
                                    </li>
                                </ul>
                            </div> --}}

                            <div class="form-group filter_button">
                                <button type="submit" class="btn theme-bg text-light rounded full-width">Filter</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Sidebar End -->

</div>

<style>
    ::selection {
        color: #fff;
        background: #17A2B8;
    }

    .wrapper {
        width: 400px;
        background: #fff;
        border-radius: 10px;
        padding: 20px 25px 40px;
        box-shadow: 0 12px 35px rgba(0, 0, 0, 0.1);
    }

    header h2 {
        font-size: 24px;
        font-weight: 600;
    }

    header p {
        margin-top: 5px;
        font-size: 16px;
    }

    .price-input {
        width: 100%;
        display: flex;
        margin: 0px 0 30px;
    }

    .price-input .field {
        display: flex;
        width: 100%;
        height: 45px;
        align-items: center;
    }

    .field input {
        width: 100%;
        height: 30px;
        outline: none;
        font-size: 16px;
        margin-left: 12px;
        border-radius: 5px;
        text-align: center;
        border: 1px solid #999;
        -moz-appearance: textfield;
    }

    input[type="number"]::-webkit-outer-spin-button,
    input[type="number"]::-webkit-inner-spin-button {
        -webkit-appearance: none;
    }

    .price-input .separator {
        width: 130px;
        display: flex;
        font-size: 19px;
        align-items: center;
        justify-content: center;
    }

    .slider {
        height: 5px;
        position: relative;
        background: #ddd;
        border-radius: 5px;
    }

    .slider .progress {
        height: 100%;
        /* left: 25%;
  right: 25%; */
        position: absolute;
        border-radius: 5px;
        background: #17A2B8;
    }

    .range-input {
        position: relative;
    }

    .range-input input {
        position: absolute;
        width: 100%;
        height: 5px;
        top: -5px;
        background: none;
        pointer-events: none;
        -webkit-appearance: none;
        -moz-appearance: none;
    }

    input[type="range"]::-webkit-slider-thumb {
        height: 17px;
        width: 17px;
        border-radius: 50%;
        background: #17A2B8;
        pointer-events: auto;
        -webkit-appearance: none;
        box-shadow: 0 0 6px rgba(0, 0, 0, 0.05);
    }

    input[type="range"]::-moz-range-thumb {
        height: 17px;
        width: 17px;
        border: none;
        border-radius: 50%;
        background: #17A2B8;
        pointer-events: auto;
        -moz-appearance: none;
        box-shadow: 0 0 6px rgba(0, 0, 0, 0.05);
    }
    [type="radio"]:checked + label:after, [type="radio"]:not(:checked) + label:after {
        background: none !important;
        top: 0px !important;
    }
</style>

<script>
    const rangeInput = document.querySelectorAll(".range-input input"),
    priceInput = document.querySelectorAll(".price-input input"),
    range = document.querySelector(".slider .progress");
    let priceGap = 500;
    priceInput.forEach(input =>{
        input.addEventListener("input", e =>{
            let minPrice = parseInt(priceInput[0].value),
            maxPrice = parseInt(priceInput[1].value);
            
            if((maxPrice - minPrice >= priceGap) && maxPrice <= rangeInput[1].max){
                if(e.target.className === "input-min"){
                    rangeInput[0].value = minPrice;
                    range.style.left = ((minPrice / rangeInput[0].max) * 100) + "%";
                }else{
                    rangeInput[1].value = maxPrice;
                    range.style.right = 100 - (maxPrice / rangeInput[1].max) * 100 + "%";
                }
            }
        });
    });
    rangeInput.forEach(input =>{
        input.addEventListener("input", e =>{
            let minVal = parseInt(rangeInput[0].value),
            maxVal = parseInt(rangeInput[1].value);
            if((maxVal - minVal) < priceGap){
                if(e.target.className === "range-min"){
                    rangeInput[0].value = maxVal - priceGap
                }else{
                    rangeInput[1].value = minVal + priceGap;
                }
            }else{
                priceInput[0].value = minVal;
                priceInput[1].value = maxVal;
                range.style.left = ((minVal / rangeInput[0].max) * 100) + "%";
                range.style.right = 100 - (maxVal / rangeInput[1].max) * 100 + "%";
            }
        });
    });
</script>