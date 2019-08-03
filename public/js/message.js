class Message {

    //Gets Messages specific to user and receiver
    show(sender) {
        $.get('/users/messages/' + sender)
            .then(response => {
                let messages = response.map(message => {
                    return `
                        <div class="${ message.sender_id == sender ? 'incoming_msg' : 'outgoing_msg' }">
                            <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                            <div class="${ message.sender_id == sender ? 'received_msg' : 'sent_msg' }"">
                                <div class="received_withd_msg">
                                    <p>${message.content}</p>
                                    <span class="time_date"> 11:01 AM    |    June 9</span></div>
                            </div>
                        </div>
                    `;
                });
                $('.msg_history').html(messages);
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