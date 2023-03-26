// script for indian phone numner validation

// ajax for phone number validation

// regex for phone number validation


$(document).ready(function() {
    $('#phone').keyup(function() {
        var phone = $('#phone').val();
        if (phone.length == 10) {
            $.ajax({
                url: "<?= base_url('auth/phone_validation') ?>",
                method: "POST",
                data: {
                    phone: phone
                },
                success: function(data) {
                    $('#phone_validation').html(data);
                }
            });
        }
    });
});