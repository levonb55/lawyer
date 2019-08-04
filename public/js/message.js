class Message {

    //Gets Messages specific to user and receiver
    show(sender, component) {
       $.get('/users/messages/' + sender)
            .then(response => {
                component(response);
            })
            .catch(error => {
                console.log(error);
            });
    }

    createMessage() {

    }

    editMessage() {

    }

    deleteMessage() {

    }
}

let message = new Message();