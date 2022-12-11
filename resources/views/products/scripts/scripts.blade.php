<script>
    $(document).ready(function() {

        var quantitiy = 1;
        $('.quantity-right-plus').click(function(e) {

            // Stop acting like a button
            e.preventDefault();
            // Get the field name
            var quantity = parseInt($('#quantity').val());

            // If is not undefined

            // Increment
            if (quantity <=99) {
                $('#quantity').val(quantity + 1);

            }

            // Increment

        });

        $('.quantity-left-minus').click(function(e) {
            // Stop acting like a button
            e.preventDefault();
            // Get the field name
            var quantity = parseInt($('#quantity').val());

            // If is not undefined

            // Increment
            if (quantity >= 2) {
                $('#quantity').val(quantity - 1);
            }
        });

    });
</script>
