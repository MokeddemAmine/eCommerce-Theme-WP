$(document).ready(function(){
    

    // delete total price of each product

    $('.page .entry-content .wc-block-cart-items__row  .wc-block-cart-item__total').each(function(){
        $(this).remove();
    });

    // delete descriptions in cart page
    $('.page .entry-content .wc-block-components-product-metadata .wc-block-components-product-metadata__description').each(function(){
        $(this).remove();
    })
    

    // edit col number of second td of the tr in products table or cart page
    $('.page .entry-content .wc-block-cart-items__row td:last-child').each(function(){
        $(this).attr('colspan','2');
    })

    // edit flex of each product on cart page
    $('.page .entry-content .wc-block-cart-item__wrap').each(function(){
        $(this).addClass('row');
    })
    $('.page .entry-content .wc-block-cart-item__wrap > *').each(function(){
        $(this).addClass('col-md-3');
    })

    $('.page .entry-header .entry-title').text('SHOPPING CART').addClass('fs-5 text-secondary');
    $('#primary.site-main').addClass('container my-3');
})