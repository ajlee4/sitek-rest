@extends('layouts.index')

@section('content')

    <div class="container container_sm basket_container">

        <div class="basket_block">
            <div class="page_hdr mb-3 mb-md-4 mt-md-4 mt-sm-2 wide">Оформление заказа</div>
            <div class="row">
                <div class="col-lg-6 mb-4 mb-lg-0 pr_lg_10 order-4 order-lg-0">

                    <div class="oneclick_order ordering_block">
                        <div class="hdr_small orderToggleSwitch">
                            <div>заказ в один клик</div>
                            <div class="hdr_small_chevron">
                                <svg width="16px" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                     viewBox="0 0 407.437 407.437" style="enable-background:new 0 0 407.437 407.437;" xml:space="preserve">
                              <polygon points="386.258,91.567 203.718,273.512 21.179,91.567 0,112.815 203.718,315.87 407.437,112.815 "/>
                            </svg>
                            </div>
                        </div>
                        <form action="#" method="post" class="ordering_block_content orderToggleContent">
                            <label class="w-100 font_thin">
                                <input class="custom_input" type="text" name="email" placeholder="Имя*" required>
                            </label>
                            <label class="w-100 font_thin">
                                <input class="custom_input" type="tel" name="phone" placeholder="Телефон*" required>
                            </label>
                            <div class="bright_label mb-3 pb-1">
                                Мы позвоним вам в течени часа и уточним подробности получения заказа
                            </div>
                            <input type="submit" class="main_btn btn_sm mt-2" value="Оставить заказ">
                        </form>
                    </div>

{{--                    <div class="oneclick_order ordering_block orderCertificatesAJAX ordering_certificates">--}}
{{--                        <div class="hdr_small orderToggleSwitch">--}}
{{--                            <div>промокоды и сертификаты</div>--}}
{{--                            <div class="hdr_small_chevron">--}}
{{--                                <svg width="16px" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"--}}
{{--                                     viewBox="0 0 407.437 407.437" style="enable-background:new 0 0 407.437 407.437;" xml:space="preserve">--}}
{{--                              <polygon points="386.258,91.567 203.718,273.512 21.179,91.567 0,112.815 203.718,315.87 407.437,112.815 "/>--}}
{{--                            </svg>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="ordering_block_content orderToggleContent">--}}
{{--                            <div class="row">--}}
{{--                                <form action="#" method="post" class="col-6 fix_forms fix_right_padding">--}}
{{--                                    <label class="w-100 font_thin">--}}
{{--                                        <input class="custom_input" type="text" name="email" placeholder="Промокод"--}}
{{--                                               required>--}}
{{--                                    </label>--}}
{{--                                    <div class="bright_label mb-3 pb-1">--}}
{{--                                        Один промокод--}}
{{--                                    </div>--}}
{{--                                    <input type="submit" class="main_btn btn_sm reversed mt-1 ts order_submit" value="Применить код">--}}
{{--                                </form>--}}
{{--                                <form action="#" method="post" class="col-6 fix_forms fix_left_padding">--}}
{{--                                    <label class="w-100 font_thin">--}}
{{--                                        <input class="custom_input" type="text" name="phone" placeholder="Код сертификата"--}}
{{--                                               minlength="8" required>--}}
{{--                                    </label>--}}
{{--                                    <div class="bright_label mb-3 pb-1">--}}
{{--                                        8-значный код--}}
{{--                                    </div>--}}
{{--                                    <input type="submit" class="main_btn btn_sm reversed mt-1 ts order_submit"--}}
{{--                                           value="Добавить сертификат">--}}
{{--                                </form>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

                    <form action="{{ route('orders.store') }}" method="post">
                        @csrf
                        <div class="oneclick_order ordering_block stepsControlStarter">
                            <div class="hdr_small">
                                <div>адрес доставки</div>
                            </div>
                            <div class="ordering_block_content">
                                <label class="w-100 font_thin">
                                    <input class="custom_input" type="text" name="name" placeholder="Имя*" required>
                                </label>
                                <label class="w-100 font_thin">
                                    <input class="custom_input" type="text" name="city"
                                           placeholder="Город / Населенный пункт*" required>
                                </label>
                                <label class="w-100 font_thin flex_input_row">
                                    <input class="custom_input flex-grow-1" type="text" name="street" placeholder="Улица*"
                                           required>
                                    <input class="custom_input input_60" type="text" name="house" placeholder="Дом*"
                                           required>
                                    <input class="custom_input input_60" type="text" name="room" placeholder="Кв-ра*"
                                           required>
                                </label>
                                <label class="w-100 font_thin">
                                    <input class="custom_input" type="email" name="email" placeholder="E-mail*" required>
                                </label>
                                <div class="bright_label pb-1">
                                    Мы пришлем на Вашу электронную почту подтверждение заказа.
                                </div>
                                <label class="w-100 font_thin pb-2">
                                    <input class="custom_input" type="tel" name="phone" placeholder="Телефон*" required>
                                </label>
{{--                                <button class="main_btn btn_sm mt-3 mb-2 w-100">доставить по этому адресу</button>--}}
                            </div>
                        </div>

                        <div class="oneclick_order ordering_block disabled">
                            <div class="hdr_small">
                                <div>способ доставки</div>
                            </div>
                            <div class="ordering_block_content">
                                <label class="w-100 font_thin">
                                    <select name="delivery" class="w-100" required>
                                        <option selected disabled>Выберите тип доставки</option>
                                        <option value="1">Курьером (бесплатно)</option>
                                        <option value="2">Почтой (80 BYN)</option>
                                    </select>
                                </label>
                                <label class="w-100 font_thin">
                                    <input class="custom_input" type="text" name="index" placeholder="Почтовый индекс*"
                                           required>
                                </label>
                                <div class="bright_label pb-1">
                                    Обратите внимание насколько корректно введены данные в предыдущем шаге.
                                </div>
                            </div>
                        </div>

                        <div class="oneclick_order ordering_block disabled">
                            <div class="hdr_small">
                                <div>Оплата</div>
                            </div>
                            <div class="ordering_block_content">
                                <label class="w-100 font_thin">
                                    <select name="payment" class="w-100" required>
                                        <option selected disabled>Выберите тип оплаты</option>
                                        <option value="1">Наличными круьеру</option>
                                        <option value="2">Картой круьеру</option>
                                    </select>
                                </label>
                            </div>
                        </div>

                        <div class="order_btn_wrapper">
                            <input type="submit" value="Отпарвить заказ" class="main_btn btn_sm disabled">
                        </div>
                        <div class="order_submit_info">
                            Размещая заказ, вы принимаете наши <a href="#">Правила и условия, Политику конфиденциальности и Политику
                                возврата товаров</a>. Вы также даете свое согласие на то, что PIZHON будет хранить некоторые
                            ваши данные с целью улучшить качество вашего обслуживания, когда вы в следующий раз будете
                            делать покупки на нашем сайте.
                        </div>
                      
                    </form>
                     <form action="" class='price-form'>
                     <input type="hidden" id="total-price-input">
                         <input type="hidden" id="delivery-price-input">
                         <input type="hidden" id="result-price-input">
                     </form>
                </div>

                <div class="col-lg-6 mb-4 mb-lg-0 pl_lg_10">
                    <div class="basket_main_wrap disableToChangeOrder">
                        <div class="hdr_small order_change_hdr">
                            <div>Товаров в корзине - <span class="basket_counter">{{ $session_cart_prods_quantity }}</span></div>
                            <div class="changeOrderBtn">
                                <div class="normal_txt">Изменить</div>
                                <div class="active_txt">Сохранить</div>
                            </div>
                        </div>
                        <!--SAME LIKE BASKET.HTML ITEM, WITHOUT "FAVORITE" BUTTON-->

                        @forelse($session_cart_prods as $session_cart_prod)
                            <div class="basket_v3 bordered_basket">
                                <div class="basket_v3_row">
                                    <div class="basket_v3_img">
                                        <img src="{{ asset('img/product-carousel-img3.png') }}" alt="product image">
                                    </div>
                                    <div class="basket_v3_info">
                                        <div class="basket_v3_title">{{ $session_cart_prod->title }}</div>
                                        <div class="basket_v3_options">

                                            <div class="basket_v3_select">
                                                <div class="basket_select_txt">Кол-во: </div>
                                                <div class="basket_select_val">

                                                    <div class="select_val_inner">
                                                        <div class="selected_value select_value_number">{{ $session_cart_prod->quantity }}</div>
                                                        <svg class="select_chevron" version="1.1" width="16px" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                             viewBox="0 0 284.929 284.929" style="enable-background:new 0 0 284.929 284.929;"
                                                             xml:space="preserve">
                                                            <g>
                                                                <path d="M282.082,195.285L149.028,62.24c-1.901-1.903-4.088-2.856-6.562-2.856s-4.665,0.953-6.567,2.856L2.856,195.285
                                                                    C0.95,197.191,0,199.378,0,201.853c0,2.474,0.953,4.664,2.856,6.566l14.272,14.271c1.903,1.903,4.093,2.854,6.567,2.854
                                                                    c2.474,0,4.664-0.951,6.567-2.854l112.204-112.202l112.208,112.209c1.902,1.903,4.093,2.848,6.563,2.848
                                                                    c2.478,0,4.668-0.951,6.57-2.848l14.274-14.277c1.902-1.902,2.847-4.093,2.847-6.566
                                                                    C284.929,199.378,283.984,197.188,282.082,195.285z"/>
                                                            </g>
                                                        </svg>
                                                    </div>

                                                    <div class="basket_v3_select_dropdown_wrap">
                                                        <div class="basket_v3_select_dropdown">
                                                            <input type="text" class="d-none value_input" name="quantity">
                                                            <div class="basket_v3_select_inner">1</div>
                                                            <div class="basket_v3_select_inner">2</div>
                                                            <div class="basket_v3_select_inner">3</div>
                                                            <div class="basket_v3_select_inner">43</div>
                                                            <div class="basket_v3_select_inner">576</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!--IF select options avaliable-->
                                            <div class="basket_v3_select">
                                                <div class="basket_select_txt">Цвет:</div>
                                                <div class="basket_select_val">

                                                    <div class="select_val_inner">
                                                        <div class="selected_value">{{ $session_cart_prod->color_title }}</div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="basket_v3_select">
                                                <div class="basket_select_txt">Размер:</div>
                                                <div class="basket_select_val">

                                                    <div class="select_val_inner">
                                                        <div class="selected_value">{{ $session_cart_prod->size }}</div>
                                                        <svg class="select_chevron" version="1.1" width="16px" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                             viewBox="0 0 284.929 284.929" style="enable-background:new 0 0 284.929 284.929;"
                                                             xml:space="preserve">

                                                        
<g>
    <path d="M282.082,195.285L149.028,62.24c-1.901-1.903-4.088-2.856-6.562-2.856s-4.665,0.953-6.567,2.856L2.856,195.285
		C0.95,197.191,0,199.378,0,201.853c0,2.474,0.953,4.664,2.856,6.566l14.272,14.271c1.903,1.903,4.093,2.854,6.567,2.854
		c2.474,0,4.664-0.951,6.567-2.854l112.204-112.202l112.208,112.209c1.902,1.903,4.093,2.848,6.563,2.848
		c2.478,0,4.668-0.951,6.57-2.848l14.274-14.277c1.902-1.902,2.847-4.093,2.847-6.566
		C284.929,199.378,283.984,197.188,282.082,195.285z"/>
</g>
</svg>
                                                    </div>

                                                    <div class="basket_v3_select_dropdown_wrap">
                                                        <div class="basket_v3_select_dropdown">
                                                            <input type="text" class="d-none value_input" name="quantity">
                                                            <div class="basket_v3_select_inner">1</div>
                                                            <div class="basket_v3_select_inner">2</div>
                                                            <div class="basket_v3_select_inner">3</div>
                                                            <div class="basket_v3_select_inner">43</div>
                                                            <div class="basket_v3_select_inner">576</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="basket_v3_price">
                                        <span class="price-product">299 </span> <span> BYN</span>
                                    </div>
                                    <div class="basket_v3_remove">
                                        <svg class="basket_v3_remove_btn" width="20px" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><title/><g data-name="1"><path d="M356.65,450H171.47a41,41,0,0,1-40.9-40.9V120.66a15,15,0,0,1,15-15h237a15,15,0,0,1,15,15V409.1A41,41,0,0,1,356.65,450ZM160.57,135.66V409.1a10.91,10.91,0,0,0,10.9,10.9H356.65a10.91,10.91,0,0,0,10.91-10.9V135.66Z"/><path d="M327.06,135.66h-126a15,15,0,0,1-15-15V93.4A44.79,44.79,0,0,1,230.8,48.67h66.52A44.79,44.79,0,0,1,342.06,93.4v27.26A15,15,0,0,1,327.06,135.66Zm-111-30h96V93.4a14.75,14.75,0,0,0-14.74-14.73H230.8A14.75,14.75,0,0,0,216.07,93.4Z"/><path d="M264.06,392.58a15,15,0,0,1-15-15V178.09a15,15,0,1,1,30,0V377.58A15,15,0,0,1,264.06,392.58Z"/><path d="M209.9,392.58a15,15,0,0,1-15-15V178.09a15,15,0,0,1,30,0V377.58A15,15,0,0,1,209.9,392.58Z"/><path d="M318.23,392.58a15,15,0,0,1-15-15V178.09a15,15,0,0,1,30,0V377.58A15,15,0,0,1,318.23,392.58Z"/><path d="M405.81,135.66H122.32a15,15,0,0,1,0-30H405.81a15,15,0,0,1,0,30Z"/></g></svg>
                                    </div>
                                </div>
                            </div>
                        @empty
                        @endforelse

                        <div class="basket_ord_total">
                            <div class="basket_ord_total_item">
                              <span> Итого</span>
                                
                                <span class='total-price'></span><span>BYN</span>
                             
                            </div>
                            <div class="basket_ord_total_item">
                                <span>Доставка почтой</span>
                                <span class='delivery-price'>80.00</span> <span>BYN</span> 
                            </div>
                            <div class="basket_ord_total_item main">
                                <span>Всего к оплате</span>
                                <span class='result-price'></span><span>BYN</span>
                            </div>
                        </div>
                 
                    </div>
                    
                </div>
            </div>
        </div>

    </div>
 
@endsection

