@extends('layouts.index')

@section('content')

    <div class="container container_sm">
        <div class="row">
            <!--breadcrumbs start-->
            <div class="col-12">
                <div class="breadcrumbs d-none d-sm-flex">
                    <a href="/">Главная</a>
                    <a href="#">Одежда</a>
                    <a href="#">Костюмы</a>
                    <span>Костюм-тройка приталенный</span>
                </div>
            </div>
            <!-- //breadcrumbs end-->
        </div>
        <div class="row position-relative productCarouselContainer">
            <div class="col-lg-7 position-relative productCarouselWrapper">
                <div class="zoom_container"></div>
                <div class="prod_carousel_wrap">
                    <div class="prod_nav_carousel d-none d-lg-inline-block">
                        <img class="prod_nav_item" src="{{ asset('img/prod_img.jpg') }}" alt="product image">
                        <img class="prod_nav_item" src="https://picsum.photos/490/560/?image=54" alt="product image">
                        <img class="prod_nav_item" src="https://picsum.photos/490/560/?image=53" alt="product image">
                        <img class="prod_nav_item" src=https://picsum.photos/490/560/?image=52 alt="product image">
                    </div>
                    <div class="prod_single_img">
                        <img src="{{ asset('img/prod_img.jpg') }}" alt="product image" data-zoom="{{ asset('img/prod_img.jpg') }}" class="zoom_img">
                        <img src="https://picsum.photos/490/560/?image=54" alt="product image" data-zoom="https://picsum.photos/980/1120/?image=54" class="zoom_img">
                        <img src="https://picsum.photos/490/560/?image=53" alt="product image" data-zoom="https://picsum.photos/980/1120/?image=53" class="zoom_img">
                        <img src=https://picsum.photos/490/560/?image=52 alt="product image" data-zoom="https://picsum.photos/980/1120/?image=52" class="zoom_img">
                    </div>
                </div>
            </div>

            <div class="col-lg-5 bg_fff">
                <div class="prod_options">
                    <div class="prod_options_title">
                        {{ $product->name }}
                    </div>
                    <div class="prod_options_brand">
                        {{ $brand->title }}
                    </div>
                    <div class="prod_option_pricewrap">
                        <!--optional-->
                        <div class="discount"> <span id="price-prod">299</span>byn</div>
                        <!-- //optional-->
                        <div class="regular">455 byn</div>
                    </div>
                    <div class="prod_option_links">
                        <!--modal trigger-->
                        <button class="option_link" data-toggle="modal" data-target="#deliveryModal">Бесплатная доставка</button>
                        <!-- //modal trigger-->

                        <!--modal trigger-->
                        <button class="option_link" data-toggle="modal" data-target="#sizesModal">Таблица Размеров</button>
                        <!-- //modal trigger-->
                    </div>
                    <form class="add_to_cart">
                        <input type="hidden" id="product_id" value="{{ $product->id }}">
                        <input type="hidden" id="product_count" value="1">
                        <div class="option_select_wrap">
                            <select name="color" class="cat_filter_select option_select colorSelect">
                                <option selected disabled hidden>Пожалуйста, выберите цвет</option>
                                @forelse($suggest_color_prods as $suggest_color_prod)
                                    @forelse($colors->where('id', $suggest_color_prod->productSpecs->color) as $color)
                                        <option data-color="{{ $color->rgb }}" data-href="{{ route('product.show.public', ['category_alias' => $suggest_color_prod->prod_category->alias,'alias' => $suggest_color_prod->alias]) }}">{{ $suggest_color_prod->name }}</option>
                                    @empty
                                    @endforelse
                                @empty
                                @endforelse
                            </select>
                            <select id="sizes" name="size" class="cat_filter_select option_select sizeSelect">
                                <option selected disabled hidden>Пожалуйста, выберите размер</option>
                                <option value="1" data-size="1">Size 1</option>
                                <option value="2" data-outOfStock="1" disabled data-size="27">Size 27 - Out of stock</option>
                                <option value="3" data-size="3">Size 3</option>
                            </select>
                        </div>
                        <div class="prod_option_btns">
                            <button type="submit" class="main_btn add_to_card">Добавить в корзину</button>
                            <button class="main_btn reversed fav_btn">
                                <span>В избранное</span>
                                <svg width="10" version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 19.481 19.481"
                                     xmlns:xlink="http://www.w3.org/1999/xlink" enable-background="new 0 0 19.481 19.481">
                                    <g>
                                        <path d="m10.201,.758l2.478,5.865 6.344,.545c0.44,0.038 0.619,0.587 0.285,0.876l-4.812,4.169 1.442,6.202c0.1,0.431-0.367,0.77-0.745,0.541l-5.452-3.288-5.452,3.288c-0.379,0.228-0.845-0.111-0.745-0.541l1.442-6.202-4.813-4.17c-0.334-0.289-0.156-0.838 0.285-0.876l6.344-.545 2.478-5.864c0.172-0.408 0.749-0.408 0.921,0z"/>
                                    </g>
                                </svg>
                            </button>
                        </div>
                    </form>
                    <form class="remove_from_cart">
                        <input type="hidden" id="product_id_del" value="{{ $product->id }}">
                        <input type="hidden" id="product_count" value="1">
                        <div class="option_select_wrap">
                            <select id="sizes_del" name="size" class="cat_filter_select option_select sizeSelect">
                                <option selected disabled hidden>Пожалуйста, выберите размер</option>
                                <option value="1" data-size="1">Size 1</option>
                                <option value="2" data-outOfStock="1" disabled data-size="27">Size 27 - Out of stock</option>
                                <option value="3" data-size="3">Size 3</option>
                            </select>
                        </div>
                        <div class="prod_option_btns">
                            <button type="submit" class="main_btn add_to_card">Удалить единицу товара</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 custom_tabs_wrap bg_fff">
                <div class="custom_tabs">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#tab1" role="tab" aria-controls="home"
                               aria-selected="true">
                                О товаре
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tab2" role="tab" aria-controls="profile"
                               aria-selected="false">
                                <span class="d-none d-sm-inline">Таблица Размеров</span>
                                <span class="d-sm-none">Таблица р-ов</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tab3" role="tab" aria-controls="contact"
                               aria-selected="false">
                                Уход
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tab4" role="tab" aria-controls="contact"
                               aria-selected="false">
                                Доставка
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="tab1" role="tabpanel">
                            <div class="row">
                                <div class="col-12">
                                    <div class="tab_prod_hdr">
                                        {{ $product->name }}
                                    </div>
                                    <div class="tab_prod_brand">
                                        {{ $brand->title }}
                                    </div>
                                </div>
                                <div class="col-lg-4 tab_column">
                                    <div class="tab_prod_code">
                                        Артикул: {{ $product->article }}
                                    </div>
                                    <div class="tab_prod_describtion">
                                        {{ $product->additionalInfo->productLookContent }}
                                    </div>
                                    <div class="tab_prod_params">
                                        <div class="tab_prod_param_item">
                                            Комплект: пиджак, жилетка, брюки
                                        </div>
                                        <div class="tab_prod_param_item">
                                            Составы:@forelse($compositions as $composition)
                                                @if($loop->count > 1)
                                                    @if($loop->first)
                                                        {{ mb_strtolower($composition->title) }},
                                                    @elseif($loop->last)
                                                        {{ mb_strtolower($composition->title) }}
                                                    @else
                                                        {{ mb_strtolower($composition->title) }},
                                                    @endif
                                                @else
                                                    {{ mb_strtolower($composition->title) }}
                                                @endif
                                            @empty

                                            @endforelse
                                        </div>
                                        {{--                                        <div class="tab_prod_param_item">--}}
                                        {{--                                            Внутренняя часть: полиэстер.--}}
                                        {{--                                        </div>--}}
                                        {{--                                        <div class="tab_prod_param_item">--}}
                                        {{--                                            Покрой: приталенный--}}
                                        {{--                                        </div>--}}
                                        {{--                                        <div class="tab_prod_param_item">--}}
                                        {{--                                            Фактура материала: гладкий--}}
                                        {{--                                        </div>--}}
                                        <div class="tab_prod_param_item">
                                            Сезон: @forelse($seasons as $season)
                                                @if($loop->count > 1)
                                                    @if($loop->first)
                                                        {{ mb_strtolower($season->title) }},
                                                    @elseif($loop->last)
                                                        {{ mb_strtolower($season->title) }}
                                                    @else
                                                        {{ mb_strtolower($season->title) }},
                                                    @endif
                                                @else
                                                    {{ mb_strtolower($season->title) }}
                                                @endif
                                            @empty

                                            @endforelse
                                        </div>
                                        <div class="tab_prod_param_item">
                                            Страна производитель: @forelse($countries as $country)
                                                @if($loop->count > 1)
                                                    @if($loop->first)
                                                        {{ $country->title }},
                                                    @elseif($loop->last)
                                                        {{ $country->title }}
                                                    @else
                                                        {{ $country->title }},
                                                    @endif
                                                @else
                                                    {{ $country->title }}
                                                @endif
                                            @empty

                                            @endforelse
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 tab_column">
                                    <div class="tab_prod_info_item">
                                        <div class="tab_info_title">Образ</div>
                                        <div class="tab_info_content">Рост модели 1,78 м, надет размер S</div>
                                    </div>
                                    <div class="tab_prod_info_item">
                                        <div class="tab_info_title">О бренде</div>
                                        <div class="tab_info_content">{{ $product->additionalInfo->brandInfo }}</div>
                                    </div>
                                    <div class="tab_prod_social mt-auto">
                                        <div class="tab_soc_title">Поделиться</div>
                                        <div class="ya-share2" data-services="telegram,twitter,facebook,vkontakte" data-counter></div>
                                        <!--<div class="social_block">-->
                                        <!--&lt;!&ndash;catch link "href" attr and set to modal button with js on click&ndash;&gt;-->
                                        <!--<a href="#testIGlink" data-checkout-link="#checkout.html"-->
                                        <!--class="ig modal_soc_btn"></a>-->
                                        <!--<a href="#testTGlink" data-checkout-link="#checkout.html"-->
                                        <!--class="tg modal_soc_btn"></a>-->
                                        <!--<a href="#testTWlink" data-checkout-link="#checkout.html"-->
                                        <!--class="tw modal_soc_btn"></a>-->
                                        <!--<a href="#testFBlink" data-checkout-link="#checkout.html"-->
                                        <!--class="fb modal_soc_btn"></a>-->
                                        <!--<a href="#testVKlink" data-checkout-link="#checkout.html"-->
                                        <!--class="vk modal_soc_btn"></a>-->
                                        <!--</div>-->
                                    </div>
                                </div>
                                <div class="col-lg-4 tab_column d-none d-lg-inline-block">
                                    <img src="{{ asset('img/tab_img.jpg') }}" alt="product image" class="tab_prod_img">
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab2" role="tabpanel">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A aliquam dolores error, et ex
                                ipsam libero maiores mollitia nisi nostrum numquam perspiciatis quam reiciendis repellat
                                tempore unde.</p>
                        </div>
                        <div class="tab-pane fade" id="tab3" role="tabpanel">
                            <p>
                                {{ $product->additionalInfo->prodContent }}
                            </p>
                        </div>
                        <div class="tab-pane fade" id="tab4" role="tabpanel">
                            <p>
                                {{ $product->additionalInfo->deliveryInfo }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12 bg_dark suggests_block">
                <div class="block-title">Носить с</div>

                <div class="product-carousel prod_page_carousel">
                    @forelse($suggest_prods as $suggest_prod)
                        <div class="prod_white_wrap">
                            <div class="slick-slide single-product">
                                <a href="#" class="add-to-favorites"></a> {{-- класс .added при добавленном избранном --}}
                                <div class="product-img"><img src="{{ asset('img/product-carousel-img1.png') }}"></div>
                                <div class="product-title">{{ $suggest_prod->name }}</div>
                                <a href="#" class="product-category">{{ $suggest_prod->prod_category->title }}</a>
                                <a href="#" class="product-link">{{ $suggest_prod->priceFull }} BYN</a>
                            </div>
                        </div>
                    @empty
                        Sorry, data is empty!
                    @endforelse
                </div>
            </div>

            <div class="col-12 suggests_block">
                <div class="block-title">НЕДАВНО ПРОСМОТРЕННЫЕ</div>

                <div class="product-carousel pt-2">
                    @forelse($recently_viewed_products as $recently_viewed_product)
                        <div class="slick-slide single-product">
                            <a href="#" class="add-to-favorites"></a>
                            <div class="product-img"><img src="{{ asset('img/product-carousel-img1.png') }}"></div>
                            <div class="product-title">{{ $recently_viewed_product->name }}</div>
                            <a href="#" class="product-category">{{ $recently_viewed_product->prod_category->title }}</a>
                            <a href="#" class="product-link">{{ $recently_viewed_product->priceFull }} BYN</a>
                        </div>
                    @empty
                        Sorry, data is empty!
                    @endforelse
                </div>
            </div>
        </div>
    </div>

@endsection

