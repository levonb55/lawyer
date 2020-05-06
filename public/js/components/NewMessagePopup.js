let newMessage = {
    popup:  $('.newMessagePopUp'),
    posPopup: function (measure) {
        this.popup.css({'right': measure});
    }
};
//Hides new message popup
$('.newMessage-hide').on('click', function () {
    newMessage.posPopup('-350px');
});

//Listens to the new message broadcasting
Echo.private('messages.' +  authUser)
    .listen('NewMessage', (message) => {

        if(typeof chatBox !== 'undefined') {
            if(message.sender_id === chatBox.profileNumber) { return; }
        }

        setTimeout(function () {
            newMessage.posPopup('-350px')
        }, 3000);
        newMessage.posPopup('10px');
        let newPopup = () => {
            return `
                <div class="newMessageUser">
                    <img src="/assets/images/profile/${message.image}" alt="Person">
                    <p class="newMessageUserName"> ${message.name} </p>
                </div>
                <div class="newMessageText">
                    <p> ${message.content.slice(0,15)} </p>
                </div>
            `;
        };
        $('.newMessageBody').html(newPopup());
    });