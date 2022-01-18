<script>
    //add love
    $(document).on("click",".ajax_love", function(){	
        var product_id = $(this).attr("data-product_id");

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            }
        });
        $.ajax({
            async: false,
            method: "post",
            url: "{{url(LaravelLocalization::getCurrentLocale())}}" + "/love",
            data: {
                product_id: product_id,
        },
        
        success: function (data) {
                $('.ajax_love' + product_id).toggleClass('active');
                $('.love_count').attr('data-notify' ,data['love_count']);
        },
        error: function (data) {
            alert('false');
        }
        });
    })

    //add review
    $(document).on("click",".ajax_addReview", function(){	
        var product_id = $(this).attr("data-product_id");
        var rating     = $('.rating').val();
        var content    = $('.content').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            }
        });
        $.ajax({
            async: false,
            method: "post",
            url: "{{url(LaravelLocalization::getCurrentLocale())}}" + "/addReview",
            data: {
                product_id: product_id,
                rating    : rating,
                content   : content,
        },
        
        success: function (data) {
            //add this review to reviews box
            $('.reviews').append(
                data['code']
            );
            //change reviews count
            $('.reviews_count').html(data['reviews_count']);
        },
        error: function (data) {
            alert('false');
        }
        });
    })

    //add to cart
    $(document).on("click",".add-to-cart", function(){
        var product_id = $(this).attr("data-product_id");
        var quantity   = $('.quantity').val();
        var color      = $('.color').val();
        var size       = $('.size').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            }
        });
        $.ajax({
            async: false,
            method: "post",
            url: "{{url(LaravelLocalization::getCurrentLocale())}}" + "/cart/add",
            data: {
                product_id  : product_id,
                quantity    : quantity,
                color       : color,
                size        : size,
            },
        
        success: function (data) {
            if(data['status'] == true){
                $('.nav_cart').attr('data-notify', data['cartItems_count']);
                $('.nav-cart-box').append(data['nav_cart_html']);
                $('.totle_price').html(data['totle_price']);
            }
        },
        error: function (data) {
            alert('false');
        }
        });
    })

    //remove from cart
    $(document).on("click",".remove-from-cart", function(){
        var product_id = $(this).attr("data-product_id");

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            }
        });
        $.ajax({
            async: false,
            method: "post",
            url: "{{url(LaravelLocalization::getCurrentLocale())}}" + "/cart/remove",
            data: {
                product_id  : product_id,
            },
        
        success: function (data) {
            $('.nav_cart').attr('data-notify', data['cartItems_count']);
            $('.totle_price').html(data['totle_price']);
            $( ".product-" + product_id).remove();
        },
        error: function (data) {
            alert('false');
        }
        });
    })

    //increment
    $(document).on("click",".increment", function(){
        var product_id = $(this).attr("data-product_id");

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            }
        });
        $.ajax({
            async: false,
            method: "post",
            url: "{{url(LaravelLocalization::getCurrentLocale())}}" + "/cart/increment",
            data: {
                product_id  : product_id,
            },
        
        success: function (data) {
            $('.totle_price').html(data['totle_price']);
            $('.quantity-' + product_id).html(data['product_quantity']);
            $('.total-item-price-' + product_id).html(data['totle_item_price']);
        },
        error: function (data) {
            alert('false');
        }
        });
    })

    //decrement
    $(document).on("click",".decrement", function(){
        var product_id = $(this).attr("data-product_id");

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            }
        });
        $.ajax({
            async: false,
            method: "post",
            url: "{{url(LaravelLocalization::getCurrentLocale())}}" + "/cart/decrement",
            data: {
                product_id  : product_id,
            },
        
        success: function (data) {
            $('.totle_price').html(data['totle_price']);
            $('.quantity-' + product_id).html(data['product_quantity']);
            $('.total-item-price-' + product_id).html(data['totle_item_price']);
        },
        error: function (data) {
            alert('false');
        }
        });
    })

</script>