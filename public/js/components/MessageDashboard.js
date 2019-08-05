$('.chat_list').on('click', function () {
    if($(this).hasClass('active_chat')) {
        return;
    }
    $('.msg_history').html('<div class="spinner text-center mt-4"><i class="fa fa-spinner fa-spin"></i></div>');

    var months = [
        "January", "February", "March", "April", "May", "June",
        "July", "August", "September", "October", "November", "December"
    ];
    //Adds background color on click
    $(".chat_list").removeClass('active_chat');
    $(this).addClass("active_chat");

    //Component to put message data into
    let messageComponent = messagesData => {
        let messages = messagesData.map(message => {
            let image = '';
            let d = new Date(message.created_at);
            if(message.image) {
                image = `/assets/images/profile/${message.image}`;
            } else {
                image = 'https://ptetutorials.com/images/user-profile.png';
            }

            return `
                <div class="${ message.sender_id == sender ? 'incoming_msg' : 'outgoing_msg' }">
                    <div class="incoming_msg_img">
                        <img src="${image}" alt="sunil">
                    </div>
                    <div class="${ message.sender_id == sender ? 'received_msg' : 'sent_msg' }"">
                        <div class="received_withd_msg">
                            <p>${message.content}</p>
                            <span class="time_date">
                                ${d.getHours() + ':' + d.getMinutes() + ' | ' + months[d.getMonth()] + ' ' + d.getDate()}
                            </span>
                        </div>
                    </div>
                </div>
            `;
        });
        $('.msg_history').html(messages);
    }

    //Gets sender id
    let sender = $(this).data('sender');

    message.show(sender, messageComponent);
});