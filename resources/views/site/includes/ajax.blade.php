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
</script>