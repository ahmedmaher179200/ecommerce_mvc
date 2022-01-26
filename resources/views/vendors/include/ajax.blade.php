<script>
    //notification seen
    $(document).on("click",".newNotificationsNumber", function(){	
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            }
        });
        $.ajax({
            async: false,
            method: "post",
            url: "{{url(LaravelLocalization::getCurrentLocale())}}" + "/vendors/notification/seen",
            data: {
        },
        
        success: function (data) {
            $('.newNotificationsNumber').html(0);
        },
        error: function (data) {
            alert(false);
        }
        });
    })

</script>