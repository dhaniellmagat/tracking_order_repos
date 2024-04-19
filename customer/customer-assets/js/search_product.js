$(document).ready(function() {
    $('#search').on('keyup', function() {
        var value = $(this).val().toLowerCase();
        var found = false; // Flag to check if any product is found
        
        $('#productTable tr').each(function() {
            var rowText = $(this).text().toLowerCase();
            var isVisible = rowText.indexOf(value) > -1;
            
            $(this).toggle(isVisible);
            
            if (isVisible) {
                found = true;
            }
        });
        
        // Show message if no product is found
        if (!found) {
            $('#noProductFound').show();
        } else {
            $('#noProductFound').hide();
        }
    });
});
