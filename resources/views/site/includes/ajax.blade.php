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
            alert('good');
        },
        error: function (data) {
            alert('false');
        }
        });
    })
</script>