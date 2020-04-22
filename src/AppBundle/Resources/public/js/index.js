
$('document').ready(function () {
    jQuery.fn.addBack = jQuery.fn.andSelf;
    $('.ordersflavours-collection').collection({
        allow_duplicate: true,
        allow_up: false,
        allow_down: false,
        min:1,
        max:4,
        elements_selector: 'tr.item',
        elements_parent_selector: '%id% tbody'
    });
});
$('document').ready(function () {
    jQuery.fn.addBack = jQuery.fn.andSelf;
    $('.orderstoppings-collection').collection({
        allow_duplicate: true,
        allow_up: false,
        allow_down: false,
        min:0,
        max:4,
        elements_selector: 'tr.item',
        elements_parent_selector: '%id% tbody'
    });
});