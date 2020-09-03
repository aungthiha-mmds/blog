<script
src="https://code.jquery.com/jquery-3.4.1.min.js"
integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
crossorigin="anonymous">
</script>
<script src="https://www.google.com/recaptcha/api.js?render=6LdfAscZAAAAANX7OiIxVxqii05CRrgVbudrqAFn"></script>
<script>
$('form').submit(function(event) {
    event.preventDefault();

    grecaptcha.ready(function() {
        grecaptcha.execute('6LdfAscZAAAAANX7OiIxVxqii05CRrgVbudrqAFn', {action: 'subscribe_newsletter'}).then(function(token) {
            $('form').prepend('<input type="hidden" name="token" value="' + token + '">');
            $('form').prepend('<input type="hidden" name="action" value="subscribe_newsletter">');
            $('form').unbind('submit').submit();
        });;
    });
});
</script>