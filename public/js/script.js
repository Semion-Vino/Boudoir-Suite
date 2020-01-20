$('.cart-add ').on('click', function () {


    if ($('.clicked').length == 0) {
        $('.choose-size').show();
        return;
    }
    $.ajax({
        url: BASE_URL + 'shop/add-to-cart',
        type: 'GET',
        dataType: 'html',
        data: {
            pid: $(this).data('pid'),
            size: $('.clicked').data('size'),
            quantity: quantityAttr

        },
        success: function () {
            window.location.reload();

        }
    })
});

//-------------------------------------------------------------------
$('.update-cart').on('click', function (e) {
    e.preventDefault();
    $.ajax({
        url: BASE_URL + 'shop/update-cart',
        type: 'GET',
        dataType: 'html',
        data: {
            pid: $(this).data('pid'),
            op: $(this).data('op'),
        },
        success: function () {
            window.location.reload();
        }
    })
});

//-----------------------------------------------------------------------

$('#search').on('click', function (e) {
    e.preventDefault();

    $('.input-group-append').css('visibility', 'visible').toggle();
    $('.search-input').css('visibility', 'visible').toggle();

})
//-------------------------------------------------------------------
//*************PRODUCT SEARCH********************************

$('#search-input').on('input', function () {
    var userSearch = $(this).val().trim();

    if (userSearch.length > 0) {
        $.ajax({
            type: 'GET',
            url: BASE_URL + 'search-products',
            dataType: 'json',
            data: {
                search: userSearch
            },
            success: function (products) {

                if (products) {
                    var availableTags = [];
                    products.forEach(function (p) {
                        availableTags.push(p.p_title);
                    })
                    $('#search-input').autocomplete({
                        source: availableTags,
                        select: function (event, ui) {
                            $('#search-input').val(ui.item.label)
                            $('#basic-addon2').click();
                        }
                    })

                }
            }
        })
    }
})
//-------------------------------------------------------------------

quantityAttr = $('#quantity').attr('data-quantity');

document.querySelector('.quantity-right-plus').addEventListener('click', function () {
    var quantity = document.getElementById('quantity');
    if (quantity.value < 100) {
        quantity.value = parseInt(quantity.value) + 1;
        quantityAttr = parseInt(quantity.value);
    }

})

//-------------------------------------------------------------------

document.querySelector('.quantity-left-minus').addEventListener('click', function () {
    var quantity = document.getElementById('quantity');
    if (quantity.value > 1) {
        quantity.value = parseInt(quantity.value) - 1;
        quantityAttr = parseInt(quantity.value);
    }


})

$('.clickable').on('click', function () {
    $('.clicked').removeClass('clicked');
    $(this).addClass('clicked');
})
