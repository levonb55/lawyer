let chatBox =  {
    history: $('.direct-chat-messages'),
    profileNumber: $('.chat-popup').data('profile'),
    content: $('.message-content'),
    scrollNumber: 1
};

//Listens to the new message broadcasting
Echo.private('messages.' +  $('#user').val())
    .listen('NewMessage', (message) => {
        if(chatBox.profileNumber == message.sender_id) {
            chatBox.history.append(incomingMessage(message.image, message.name, message.content, new Date(message.created_at)));
            app.scrollToBottom('.popup-messages');
        }
    });

//Opens popup chat window
$('.Message_now').on('click', function () {

    if(!$(this).hasClass('active')) {

        chatBox.history.html('<div class="loading">Loading ...</div>');

        //Component to put messages data into
        let messagesComponent = messagesData => {
            if(messagesData.messages.length > 0) {
                chatBox.history.data('messages', messagesData.messagesCount);

                let messagesFeed = messagesData.messages.reverse().map(message => {
                    if(message.sender_id == chatBox.profileNumber) {
                        return incomingMessage(message.image, message.name, message.content, new Date(message.created_at));
                    }

                    return incomingMessage(message.image, message.name, message.content, new Date(message.created_at), 'direct-chat-text1');

                });

                chatBox.history.html(messagesFeed);
                app.scrollToBottom('.popup-messages');
            } else {
                chatBox.history.html('<div class="no-message">No message to show.</div>');
            }
        };

        message.show(chatBox.profileNumber, messagesComponent, chatBox.scrollNumber);
    }

    $(this).addClass('active');

});


//Loads messages on scroll
$('.popup-messages').on('scroll', function () {
    if($(this).scrollTop() == 0) {
        if(chatBox.scrollNumber * 10 < chatBox.history.data('messages')) {
            $('.load-messages').css('visibility', 'visible');

            //Component to put messages data into
            let messagesComponent = messagesData => {
                let messagesLength = messagesData.messages.length - 1;
                let messagesFeed = messagesData.messages.reverse().map(message => {
                    return incomingMessage(message.image, message.name, message.content, new Date(message.created_at));
                });

                chatBox.history.prepend(messagesFeed);
                $('.load-messages').css('visibility', 'hidden');
                if($('.direct-chat-msg')[messagesLength]) {
                    $('.direct-chat-msg')[messagesLength].scrollIntoView({behavior: "smooth", block: "center", inline: "nearest"});
                }
            };

            message.show(chatBox.profileNumber, messagesComponent, ++chatBox.scrollNumber);
        }
    }
});

//Stores messages
$('#chatbox-form').on('submit', function (e) {
    e.preventDefault();

    // //Makes message field required
    if(!chatBox.content.val()) { return; }

    //Component for the sent message
    let sentMessage = messageData => {
        $('.no-message').remove();
        chatBox.content.val('');
        chatBox.history.append(incomingMessage(messageData.image, messageData.name, messageData.content, new Date(messageData.created_at), 'direct-chat-text1'));
        app.scrollToBottom('.popup-messages');
    };

    let failedMessage = (errorMessage) => {
        chatBox.history.after(`<div class="text-white">${errorMessage}</div>`);
        app.scrollToBottom('.popup-messages');
    };

    message.store($(this).serialize(), sentMessage, failedMessage);
});


function incomingMessage(image, name, content, createdAt, outgoingMessage = '') {
    return `
        <div class="chat-box-single-line">
            <abbr class="timestamp">${app.months[createdAt.getMonth()] + ' ' + createdAt.getDate() + ', ' + createdAt.getFullYear()}</abbr>
        </div>

        <div class="direct-chat-msg doted-border">
            <div class="direct-chat-info clearfix">
                <span class="direct-chat-name pull-left">${name}</span>
            </div>
            
            <img alt="message user image" src="${appUrl}/assets/images/profile/${image}" class="direct-chat-img">
            
            <div class="direct-chat-text ${outgoingMessage}"> <p>${content}</p> </div>
            
            <div class="direct-chat-info clearfix">
                <span class="direct-chat-timestamp pull-right">${app.appendZero(createdAt.getHours()) + ':' + app.appendZero(createdAt.getMinutes())}</span>
            </div>
        </div>
    `;

}

app.goToNewLine($('.message-content'), $('#chatbox-form'));
