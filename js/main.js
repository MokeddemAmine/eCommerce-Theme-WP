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
})