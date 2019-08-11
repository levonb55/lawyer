import Echo from "laravel-echo"

window.Pusher = require('pusher-js');

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: '94601e3f1268c05f59ac',
    cluster: 'us2',
    forceTLS: true
});