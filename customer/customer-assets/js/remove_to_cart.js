$(document).ready(function() {
    $('.remove-from-cart-btn').click(function() {
        var productId = $(this).data('product-id');

        // Send an AJAX request to remove the product from the cart
        $.ajax({
            url: 'customer-config/remove_from_cart.php',
            type: 'POST',
            data: { product_id: productId },
            dataType: 'json', // Specify the expected data type of the response
            success: function(response) {
                if (response.success) {
                    // Product removed successfully, handle UI update
                    alert(response.message); // Display a success message (you can customize this)
                    location.reload(); // Reload the page to reflect the updated cart
                } else {
                    // Product removal failed, handle error
                    alert(response.message); // Display an error message (you can customize this)
                }
            },
            error: function(xhr, status, error) {
                // Handle AJAX error
                console.error(xhr.responseText);
                alert('An error occurred while processing your request. Please try again.');
            }
        });
    });
});
