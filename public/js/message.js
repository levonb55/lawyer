class Message {
    constructor() {
        this.appUrl = "";
        if(window.location.hostname !== 'lawyer.loc') {
            this.appUrl = 'http://myworks.site/dev/lawyer/public';
        }
    }

    //Gets Messages specific to user and receiver
    show(sender, component) {
       $.get(this.appUrl + '/users/messages/' + sender)
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