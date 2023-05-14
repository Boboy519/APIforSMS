$(document).ready(function() {
    $('#smsForm').on('submit', function(e) {
        e.preventDefault();
        
        var phone = $('#phone').val();
        var message = $('#message').val();
        
        if (phone && message) {
            $.ajax({
                url: 'send-sms.php',  // PHP file handling SMS sending
                method: 'POST',
                data: {
                    phone: phone,
                    message: message
                },
                success: function(response) {
                    console.log('SMS sent successfully!');
                    // Additional logic or UI updates upon success
                },
                error: function(xhr, status, error) {
                    console.log('SMS sending failed: ' + error);
                    // Additional error handling or UI updates upon failure
                }
            });
        }
    });
});
