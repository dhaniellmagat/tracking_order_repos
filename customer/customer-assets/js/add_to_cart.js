$(document).ready(function() {
    $('.add-to-cart-btn').click(function() {
        var productId = $(this).data('product-id');

        $.ajax({
            url: 'customer-config/add_to_cart.php',
            type: 'POST',
            data: { productId: productId },
            success: function(response) {
                if (response === 'success') {
                    alert('Product added to cart successfully!');
                    location.reload();
                    // You can update the cart count or perform any other actions here
                } else {
                    alert('An error occurred while adding the product to cart.');
                }
            },
            error: function(xhr, status, error) {
                alert('An error occurred while adding the product to cart.');
                console.error(error);
            }
        });
    });
});
