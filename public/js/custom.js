function setBasket(prods) {
    let prodsTotal = 0;
    let prodSingleTotal = 0;
    const $basketWrap = $('.minicart-widget .minicart-content')
    $basketWrap.html('')

    const prodsBuilder = (prod) => {

        prodSingleTotal = (prod.price * prod.quantity).toFixed(2)

        return `
                <div class="single-cart-item row no-gutters">
                    <div class="item-img"><img src="/img/category-img3.png"></div>
                    <div class="item-info">
                        <div class="item-name">${prod.title}</div>
                        <div class="item-option">Кол-во: ${prod.quantity} - ${prodSingleTotal} BYN</div>
                        <div class="item-option">Цвет: ${prod.color_title}</div>
                        <div class="item-option">Размер: ${prod.size}</div>
                    </div>
                    <a href="#" class="item-remove"></a href="#">
                </div>
            `
    }

    for (const prod of prods) {
        prodsTotal = prodsTotal + (prod.price * prod.quantity)
        $basketWrap.append(prodsBuilder(prod))
    }
    prodsTotal = prodsTotal.toFixed(2)
    $(".minicart-total .total-number").text(`Всего: ${prodsTotal} BYN`)
}



function summProducts(prods) { 
    let productPrice =0
    let totalPrice =0
    let priceProductField = $('.price-product');
    let totalPriceField = $('.total-price');
    let deliveryPriceField = Number($('.delivery-price').text());
    let resultPriceField = $('.result-price');
    for (let i=0;i<prods.length;i++) {
        productPrice = (prods[i].price * prods[i].quantity);
        priceProductField[i].innerText = productPrice.toFixed(2);
        totalPrice+=productPrice
}
totalPrice=totalPrice.toFixed(2);
totalPriceField.text(`${totalPrice}`)
resultPriceField.text(`${(Number(totalPrice)+deliveryPriceField).toFixed(2)}`)
$('#total-price-input').val(totalPrice)
$('#delivery-price-input').val( deliveryPriceField) 
$('#result-price-input').val(totalPrice+deliveryPriceField) 

}

// $(document).on("click",  $(".minicart-content .item-remove"), function(e){
//     e.preventDefault()
//     $(this).parent(".single-cart-item").hide()
// })

$(document).ready(function(){
 
    $.ajax(
        {
            url: '/cart/total-count-prods',
            type: 'GET',
            dataType: 'json',
            success: function (response){
                if(response){
                    $('#total_card_count').html(response.total_quantity);
                    setBasket(response.session_prods);
                    summProducts(response.session_prods)
                }
            }
        });

    let total_price = 0.0;
    $('.basket_v3_price').each(function()
    {
        total_price += parseFloat($(this).text());
    });
    $('.total').text(total_price + ' BYN');

});

$('.add_to_cart').on('submit',function(e){
    e.preventDefault();

    let data = JSON.stringify($(this).serialize());

    let size = $('#sizes').find("option:selected").data('size');
    let product_id = $('#product_id').val();
    // let count = $('#product_count').val();

    data += '&' + 'size' + '=' + size;
    data += '&' + 'product_id' + '=' + product_id;
    // data += '&' + 'count' + '=' + count;

    $.ajax(
        {
            url: '/cart/add-to-cart',
            type: 'GET',
            dataType: 'json',
            data: data,
            success: function (response){
                if(response){
                    $('#total_card_count').html(response.total_quantity);
                    setBasket(response.session_prods);
                }
            }
        });
});

$('.remove_from_cart').on('submit',function(e){
    e.preventDefault();

    let data = JSON.stringify($(this).serialize());

    let size = $('#sizes_del').find("option:selected").data('size');
    let product_id = $('#product_id_del').val();
    // let count = $('#product_count').val();

    data += '&' + 'size' + '=' + size;
    data += '&' + 'product_id' + '=' + product_id;
    // data += '&' + 'count' + '=' + count;

    $.ajax(
        {
            url: '/cart/remove-from-cart',
            type: 'GET',
            dataType: 'json',
            data: data,
            success: function (response){
                if(response){
                    $('#total_card_count').html(response.total_quantity);
                }
            }
        });
});









