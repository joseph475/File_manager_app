$(document).ready(hideMessage);

function hideMessage() {
    setTimeout(
        function () {
            if ($('.message').length == 1) {
                $('.message').remove();
            }
        }, 4000
    )
}
