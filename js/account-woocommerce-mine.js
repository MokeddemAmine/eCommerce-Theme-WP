$(document).ready(function(){
    $('.site-main#primary .page').addClass('container');
    $('form button[type=submit]').addClass('btn-main');

    console.log($('#footer-mine').outerHeight(true) , parseInt($('#footer-mine')[0].offsetTop) , window.innerHeight );
    if($('#footer-mine')[0].offsetHeight + $('#footer-mine')[0].offsetTop < window.innerHeight ){
        $('#footer-mine').css({
            position:'fixed',
            bottom:'0',
            left:'0',
            right:'0',
            marginTop:'2rem'
        })
    }

    $('form .woocommerce-address-fields input').addClass('form-control')
    $('form .woocommerce-address-fields select').addClass('form-select')
    $('form.woocommerce-EditAccountForm select').addClass('form-select')
    $('form.woocommerce-EditAccountForm input').addClass('form-control')

    $('.woocommerce-button').addClass('btn-main')
})