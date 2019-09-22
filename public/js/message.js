class Message {

    //Gets Messages specific to a user and receiver
    show(contact, component, scroll) {
       $.get(appUrl + '/users/messages/' + contact + '/' + scroll)
            .then(response => {
                component(response);
            })
            .catch(error => {
                console.log(error);
            });
    }

    store(messsageInput, component) {
        $.ajax({
            method: 'POST',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: appUrl + '/messages/store',
            data: messsageInput
        })
        .done(function(response) {
            component(response);
        })
        .fail(function() {
            $('.msg_history').after('<div class="text-danger mb-3">An error happened while posting a message!</div>');
        });
    }

    editMessage() {

    }

    deleteMessage() {

    }

    markAsRead(id) {
        $.ajax({
            method: 'PUT',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: appUrl + `/messages/${id}/read`
        })
        .catch(() => {
            console.log('An error happened while marking a message as read.');
        });
    }
}

let message = new Message();
