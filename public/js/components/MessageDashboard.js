let conversation = {
    messageHistory: $('.msg_history'),
    months: [
        "January", "February", "March", "April", "May", "June",
        "July", "August", "September", "October", "November", "December"
    ]
};

//Gets messages of a conversation
$('.chat_list').on('click', function () {

    $('#content').val('');

    if($(this).hasClass('active_chat')) {
        return;
    }

    conversation.messageHistory.html('<div class="spinner text-center mt-4"><i class="fa fa-spinner fa-spin"></i></div>');

    //Adds background color on click
    $(".chat_list").removeClass('active_chat');
    $(this).addClass("active_chat");

    //Component to put messages data into
    let messagesComponent = messagesData => {
        let messagesFeed = messagesData.map(message => {
            let image = '';
            let d = new Date(message.created_at);
            if(message.image) {
                image = appUrl + `/assets/images/profile/${message.image}`;
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
                                ${d.getHours() + ':' + d.getMinutes() + ' | ' + conversation.months[d.getMonth()] + ' ' + d.getDate()}
                            </span>
                        </div>
                    </div>
                </div>
            `;
        });

        conversation.messageHistory.html(messagesFeed);
        scrollToBottom('.msg_history');
    }

    //Gets sender id
    let sender = $(this).data('sender');

    $('.type_msg').show();
    $('#receiver').val(sender);

    message.show(sender, messagesComponent);
});

//Stores messages
$('#message-form').on('submit', function (e) {
    e.preventDefault();

    if(!$('#content').val()) {
        return;
    }
    //Component for the sent message
    let sentMessage = messageData => {

        let d = new Date(messageData.created_at);
        if(messageData.image) {
            image = appUrl + `/assets/images/profile/${messageData.image}`;
        } else {
            image = 'https://ptetutorials.com/images/user-profile.png';
        }
        let message = `
            <div class="outgoing_msg">
                <div class="incoming_msg_img">
                    <img src="${image}" alt="sunil">
                </div>
                <div class="sent_msg">
                    <div class="received_withd_msg">
                        <p>${messageData.content}</p>
                        <span class="time_date">
                            ${d.getHours() + ':' + d.getMinutes() + ' | ' + conversation.months[d.getMonth()] + ' ' + d.getDate()}
                        </span>
                    </div>
                </div>
            </div>
        `;

        $('#content').val('');
        conversation.messageHistory.append(message);
        scrollToBottom('.msg_history');
    };

    message.store($(this).serialize(), sentMessage);
});

//Scrolls the element to the bottom
function scrollToBottom(el) {
    document.querySelector(el).scrollTo(0, document.querySelector(el).scrollHeight);
}