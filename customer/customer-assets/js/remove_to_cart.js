document.addEventListener('DOMContentLoaded', () => {
    const removeButtons = document.querySelectorAll('.remove-from-cart-btn');
    removeButtons.forEach(button => {
        button.addEventListener('click', (event) => {
            event.preventDefault(); // Prevent default form submission behavior

            const product_id = button.dataset.product_id;
            // Assuming you want to remove the entire row when clicking remove
            const row = button.closest('tr');
            
            // Perform AJAX request to remove the product from the cart
            $.ajax({
                url: 'customer-config/remove_from_cart.php',
                type: 'POST',
                data: { product_id: product_id },
                success: function(response) {
                    if (response === 'success') {
                        // Remove the row from the table
                        row.remove();
                        // You can update the cart count or perform any other actions here
                    } else {
                        alert('An error occurred while removing the product from cart.');
                    }
                },
                error: function(xhr, status, error) {
                    alert('An error occurred while removing the product from cart.');
                    console.error(error);
                }
            });
        });
    });
});
