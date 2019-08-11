let messages = {
    history: $('.msg_history'),
    months: [
        "January", "February", "March", "April", "May", "June",
        "July", "August", "September", "October", "November", "December"
    ]
};

//Gets messages of a messages
$('.chat_list').on('click', function () {

    $('#content').val('');

    if($(this).hasClass('active_chat')) {
        return;
    }

    messages.history.html('<div class="spinner text-center mt-4"><i class="fa fa-spinner fa-spin"></i></div>');

    //Adds background color to a selected contact on click
    $(".chat_list").removeClass('active_chat');
    $(this).addClass("active_chat");

    //Component to put messages data into
    let messagesComponent = messagesData => {
        let messagesFeed = messagesData.map(message => {
            let image = '';
            if(message.image) {
                image = appUrl + `/assets/images/profile/${message.image}`;
            } else {
                image = 'https://ptetutorials.com/images/user-profile.png';
            }

            if(message.sender_id == contactId) {
                return incomingMessage(image, message.content, new Date(message.created_at));
            } else {
                return outgoingMessage(image, message.content, new Date(message.created_at));
            }

        });

        messages.history.html(messagesFeed);
        scrollToBottom('.msg_history');
    }

    //Gets contact id
    let contactId = $(this).data('contact');

    $('.type_msg').show();
    $('#contact').val(contactId);

    message.show(contactId, messagesComponent);
});

//Stores messages
$('#message-form').on('submit', function (e) {
    e.preventDefault();

    if(!$('#content').val()) {
        return;
    }

    //Component for the sent message
    let sentMessage = messageData => {
        let userId = $('#user').val();

        let image = '';
        if(messageData.image) {
            image = appUrl + `/assets/images/profile/${messageData.image}`;
        } else {
            image = 'https://ptetutorials.com/images/user-profile.png';
        }

        $('#content').val('');
        messages.history.append(outgoingMessage(image, messageData.content, new Date(messageData.created_at)));
        scrollToBottom('.msg_history');

        //listens new message broadcast
        Echo.channel('messages.' +  userId)
            .listen('NewMessage', (message) => {
                if(message.image) {
                    image = appUrl + `/assets/images/profile/${messageData.image}`;
                } else {
                    image = 'https://ptetutorials.com/images/user-profile.png';
                }
                if($('#contact').val() == message.sender_id) {
                    messages.history.append(incomingMessage(image, message.content, new Date(message.created_at)));
                    scrollToBottom('.msg_history');
                } else {
                    alert('New Message');
                }
            });
    };

    message.store($(this).serialize(), sentMessage);
});

//Scrolls the element to the bottom
function scrollToBottom(el) {
    document.querySelector(el).scrollTo(0, document.querySelector(el).scrollHeight);
}

function outgoingMessage(image, content, createdAt) {
    return `
        <div class="outgoing_msg">
            <div class="incoming_msg_img">
                <img src="${image}" alt="sunil">
            </div>
            <div class="sent_msg">
                <div class="received_withd_msg">
                    <p>${content}</p>
                    <span class="time_date">
                        ${createdAt.getHours() + ':' + createdAt.getMinutes() + ' | ' + messages.months[createdAt.getMonth()] + ' ' + createdAt.getDate()}
                    </span>
                </div>
            </div>
        </div>
    `;
}

function incomingMessage(image, content, createdAt) {
    return `
        <div class="incoming_msg">
            <div class="incoming_msg_img">
                <img src="${image}" alt="sunil">
            </div>
            <div class="received_msg">
                <div class="received_withd_msg">
                    <p>${content}</p>
                    <span class="time_date">
                        ${createdAt.getHours() + ':' + createdAt.getMinutes() + ' | ' + messages.months[createdAt.getMonth()] + ' ' + createdAt.getDate()}
                    </span>
                </div>
            </div>
        </div>
    `;
}

