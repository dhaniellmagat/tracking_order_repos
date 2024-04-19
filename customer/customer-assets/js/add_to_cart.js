$(document).ready(function() {
    $('.add-to-cart-btn').each(function() {
        var quantityInStock = parseInt($(this).data('quantity-in-stock'));
        if (quantityInStock <= 0) {
            // Disable the button if quantity in stock is 0 or less
            $(this).prop('disabled', true);
        }
    });

    $('.add-to-cart-btn').click(function() {
        var productId = $(this).data('product-id');
        var quantityInStock = parseInt($(this).data('quantity-in-stock'));

        if (quantityInStock > 0) {
            $.ajax({
                url: 'customer-config/add_to_cart.php',
                type: 'POST',
                data: { productId: productId },
                success: function(response) {
                    if (response === 'success') {
                        alert('Product added to cart successfully!');
                        location.reload();
                    } else {
                        alert('An error occurred while adding the product to cart.');
                        location.reload();
                    }
                },
                error: function(xhr, status, error) {
                    alert('An error occurred while adding the product to cart.');
                    location.reload();
                    console.error(error);
                }
            });
        } else {
            alert('This product is out of stock.');
        }
    });
});
