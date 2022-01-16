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
            $('.reviews_pox').append(
                '<div class="flex-w flex-t p-b-68">' +
                    '<div class="wrap-pic-s size-109 bor0 of-hidden m-r-18 m-t-6">' +
                        '<img src="#" alt="AVATAR">' +
                    '</div>' +

                    '<div class="size-207">' +
                        '<div class="flex-w flex-sb-m p-b-17">' +
                            '<span class="mtext-107 cl2 p-r-20">' +
                            {{auth('web')->user()->id}}+
                            '</span>' +

                            '<span class="fs-18 cl11">'+
                                // for (let i = 0; i < data['rating']; i++) {
                                //     '<i class="zmdi zmdi-star"></i>' +
                                // }

                                // for (let i = 0; i < 5 - data['rating']; i++) {
                                //     '<i class="zmdi zmdi-star-outline"></i>'
                                // }
                                
                            '</span>'+
                        '</div>' +

                        '<p class="stext-102 cl6">' +
                            content +
                        '</p>'+
                    '</div>' +
                '</div>'
            );    
        },
        error: function (data) {
            alert('false');
        }
        });
    })
</script>