import Echo from "laravel-echo"

// window.Pusher = require('pusher-js');
//
// window.Echo = new Echo({
//     authEndpoint : '/broadcasting/auth',
//     broadcaster: 'pusher',
//     key: '94601e3f1268c05f59ac',
//     cluster: 'us2',
//     forceTLS: true
// });

window.io = require('socket.io-client');

window.Echo = new Echo({
    broadcaster: 'socket.io',
    host: window.location.hostname + ':6001',
});
