jQuery(document).ready(function($) {
  $('#price-range').on('change', function() {
    let range = $(this).val();
    // Show loading indicator
    $('#product-list').html('<p>Loading products...</p>');
    $.ajax({
      url: custom_ajax_object.ajax_url,
      type: 'POST',
      data: {
        action: 'filter_products_by_price',
        price: range
      },
      success: function(response) {
        $('#product-list').html(response);
        // Smooth scroll to product list
        $('html, body').animate({
          scrollTop: $('#product-list').offset().top - 60
        }, 400);
      },
      error: function() {
        $('#product-list').html('<p>Sorry, something went wrong. Please try again.</p>');
      }
    });
  });
});
    else :
         echo '<p>No products found.</p>';
     endif;
     ?>
 </div>
 
 <?php get_footer(); ?>