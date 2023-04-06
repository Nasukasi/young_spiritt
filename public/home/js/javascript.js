$(document).ready(function() {
    var products = $('.product-item');
    var showMoreBtn = $('#show-more-btn');
    var count = 3;
    var numItems = products.length;

    products.slice(0, count).addClass('show');

    if (numItems > count) {
        showMoreBtn.show();
    }

    showMoreBtn.on('click', function() {
        var hiddenItems = products.filter(':hidden');
        count += 3;
        hiddenItems.slice(0, count).addClass('show');

        if (hiddenItems.length <= count) {
            showMoreBtn.hide();
        }
    });
});
