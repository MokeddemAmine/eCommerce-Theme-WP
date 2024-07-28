const dropdownElementList = document.querySelectorAll('.dropdown-toggle')
const dropdownList = [...dropdownElementList].map(dropdownToggleEl => new bootstrap.Dropdown(dropdownToggleEl))

$(document).ready(function(){
    $('.dropdown-mine').hover(function(e){
        e.preventDefault();
        $(this).find('.dropdown-menu-list-mine').css('display','flex');
    },function(){
        $(this).find('.dropdown-menu-list-mine').css('display','none');
    })

    $('.dropdown-menu-list-mine').hover(function(){
        $(this).css('display','flex');
    })

    // hide the search product of woocommerce
    $('#search-header-icon').click(function(){
        $('.search-product-woocommerce').slideToggle(200);
    })
    $('.search-product-woocommerce .close').click(function(){
        $('.search-product-woocommerce').slideUp(200);
    })

    // add and substract the number of product 
    $('.product .cart .quantity').prepend('<span class="minus-quantity">-</span>');
    $('.product .cart .quantity').append('<span class="plus-quantity">+</span>');

    $('.minus-quantity').click(function(){
        if(parseInt($(this).siblings('input[type=number]').val()) > 0){
            $(this).siblings('input[type=number]').val(parseInt($(this).siblings('input[type=number]').val()) - 1);
        }
        
    })
    $('.plus-quantity').click(function(){
        $(this).siblings('input[type=number]').val(parseInt($(this).siblings('input[type=number]').val()) + 1);
    })

    // add title to related product
    if(parseInt($('body').width()) > 768){
        $('.product .related ul.products').prepend('<h3 class="text-center text-uppercase text-secondary fs-5 my-3">related products</h3>');
        $('.product .related h2').hide();
    }

    // chose size filtering
    $('.size-filter label').click(function(){
        $(this).parent('div').siblings().find('label').removeClass('size-label-checked');

        $(this).addClass('size-label-checked');
    })
    $('.color-filter label').click(function(){
        $(this).siblings('label').removeClass('color-label-checked');

        $(this).addClass('color-label-checked');
    })

    $('.filter-section h6').click(function(){
        
        if($($(this).find('i')).hasClass('fa-chevron-down')){
            $($(this).find('i')).removeClass('fa-chevron-down');
            $($(this).find('i')).addClass('fa-chevron-right');
        }else if($($(this).find('i')).hasClass('fa-chevron-right')){
            $($(this).find('i')).removeClass('fa-chevron-right');
            $($(this).find('i')).addClass('fa-chevron-down');
        }
        $($(this).siblings('div')).slideToggle(200);
    })

    // minimize sorting products in category page
    var options = $('.page .entry-content .woocommerce .orderby option');
    var regex = new RegExp('\\b'+'Sort by '+'\\b','gi');
    options.each(function(i,option){
        var newText = option.textContent.replace(regex,'');
        option.textContent = newText;
    })

    

    
    
    
})