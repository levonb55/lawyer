let chatBox =  {
    history: $('.direct-chat-messages'),
    profileNumber: $('.chat-popup').data('profile'),
    scrollNumber: 0
};

$('.Message_now').on('click', function () {

    chatBox.history.html('<div class="loading">Loading ...</div>');

    //Component to put messages data into
    let messagesComponent = messagesData => {
        chatBox.history.data('messages', messagesData.messagesCount);

        let messagesFeed = messagesData.messages.reverse().map(message => {
            return incomingMessage(message.image, message.name, message.content, new Date(message.created_at));
        });

        chatBox.history.html(messagesFeed);
        app.scrollToBottom('.popup-messages');
    };

    message.show(chatBox.profileNumber, messagesComponent, chatBox.scrollNumber);
});

function incomingMessage(image, name, content, createdAt) {
    return `
        <div class="chat-box-single-line">
            <abbr class="timestamp">${app.months[createdAt.getMonth()] + ' ' + createdAt.getDate() + ', ' + createdAt.getFullYear()}</abbr>
        </div>

        <div class="direct-chat-msg doted-border">
            <div class="direct-chat-info clearfix">
                <span class="direct-chat-name pull-left">${name}</span>
            </div>
            
            <img alt="message user image" src="${appUrl}/assets/images/profile/${image}" class="direct-chat-img">
            
            <div class="direct-chat-text">${content}</div>
            
            <div class="direct-chat-info clearfix">
                <span class="direct-chat-timestamp pull-right">${app.appendZero(createdAt.getHours()) + ':' + app.appendZero(createdAt.getMinutes())}</span>
            </div>
        </div>
    `;

}

$('.popup-messages').on('scroll', function () {
    if($(this).scrollTop() == 0) {
        if(chatBox.scrollNumber * 10 < chatBox.history.data('messages')) {
            $('.load-messages').css('visibility', 'visible');

            //Component to put messages data into
            let messagesComponent = messagesData => {
                let messagesFeed = messagesData.messages.reverse().map(message => {
                    return incomingMessage(message.image, message.name, message.content, new Date(message.created_at));
                });

                chatBox.history.prepend(messagesFeed);
                $('.load-messages').css('visibility', 'hidden');
                if($('.chat-box-single-line')[10]) {
                    $('.chat-box-single-line')[10].scrollIntoView({behavior: "smooth", block: "center", inline: "nearest"});
                }
            };

            message.show(chatBox.profileNumber, messagesComponent, ++chatBox.scrollNumber);
        }
    }
});
