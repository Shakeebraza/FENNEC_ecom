<?php
require_once 'global.php';
include_once 'header.php';
$setSession = $fun->isSessionSet();

if ($setSession == false) {
    $redirectUrl = $urlval . 'index.php'; 
    echo '
    <script>
        window.location.href = "' . $redirectUrl . '";
    </script>'; 
    exit();
}
$userid = intval(base64_decode($_SESSION['userid'])) ?? 0; 
$userData = $dbFunctions->getDatanotenc('user_detail', "userid = '$userid'");
?>
<style>
/* **********************************
Reset CSS
************************************** */

html,
body,
div,
span,
applet,
object,
iframe,
h1,
h2,
h3,
h4,
h5,
h6,
p,
blockquote,
pre,
a,
abbr,
acronym,
address,
big,
cite,
code,
del,
dfn,
em,
img,
ins,
kbd,
q,
s,
samp,
small,
strike,
strong,
sub,
sup,
tt,
var,
b,
u,
i,
center,
dl,
dt,
dd,
ol,
ul,
li,
fieldset,
form,
label,
legend,
table,
caption,
tbody,
tfoot,
thead,
tr,
th,
td,
article,
aside,
canvas,
details,
embed,
figure,
figcaption,
footer,
header,
hgroup,
menu,
nav,
output,
ruby,
section,
summary,
time,
mark,
audio,
video {
    margin: 0;
    padding: 0;
    border: 0;
    font-size: 100%;
    font: inherit;
    vertical-align: baseline;
}


/* HTML5 display-role reset for older browsers */

article,
aside,
details,
figcaption,
figure,
footer,
header,
hgroup,
menu,
nav,
section {
    display: block;
}

body {
    line-height: 1.5;
}

ol,
ul {
    list-style: none;
}

blockquote,
q {
    quotes: none;
}

blockquote:before,
blockquote:after,
q:before,
q:after {
    content: '';
    content: none;
}

table {
    border-collapse: collapse;
    border-spacing: 0;
}


/********************************
 Typography Style
******************************** */

body {
    margin: 0;
    font-family: 'Open Sans', sans-serif;
    line-height: 1.5;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}

html {
    min-height: 100%;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}

h1 {
    font-size: 36px;
}

h2 {
    font-size: 30px;
}

h3 {
    font-size: 26px;
}

h4 {
    font-size: 22px;
}

h5 {
    font-size: 18px;
}

h6 {
    font-size: 16px;
}

p {
    font-size: 15px;
}

a {
    text-decoration: none;
    font-size: 15px;
}

* {
  margin-bottom: 0;
}


/* *******************************
message-area
******************************** */

.message-area {
    height: 100vh;
    overflow: hidden;
    padding: 30px 0;
    background: #f5f5f5;
}

.chat-area {
    position: relative;
    width: 100%;
    background-color: #fff;
    border-radius: 0.3rem;
    height: 90vh;
    overflow: hidden;
    min-height: calc(100% - 1rem);
}

.chatlist {
    outline: 0;
    height: 100%;
    overflow: hidden;
    width: 300px;
    float: left;
    padding: 15px;
}

.chat-area .modal-content {
    border: none;
    border-radius: 0;
    outline: 0;
    height: 100%;
}

.chat-area .modal-dialog-scrollable {
    height: 100% !important;
}

.chatbox {
    width: auto;
    overflow: hidden;
    height: 100%;
    border-left: 1px solid #ccc;
}

.chatbox .modal-dialog,
.chatlist .modal-dialog {
    max-width: 100%;
    margin: 0;
}

.msg-search {
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.chat-area .form-control {
    display: block;
    width: 80%;
    padding: 0.375rem 0.75rem;
    font-size: 14px;
    font-weight: 400;
    line-height: 1.5;
    color: #222;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ccc;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    border-radius: 0.25rem;
    transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
}

.chat-area .form-control:focus {
    outline: 0;
    box-shadow: inherit;
}

a.add img {
    height: 36px;
}

.chat-area .nav-tabs {
    border-bottom: 1px solid #dee2e6;
    align-items: center;
    justify-content: space-between;
    flex-wrap: inherit;
}

.chat-area .nav-tabs .nav-item {
    width: 100%;
}

.chat-area .nav-tabs .nav-link {
    width: 100%;
    color: #180660;
    font-size: 14px;
    font-weight: 500;
    line-height: 1.5;
    text-transform: capitalize;
    margin-top: 5px;
    margin-bottom: -1px;
    background: 0 0;
    border: 1px solid transparent;
    border-top-left-radius: 0.25rem;
    border-top-right-radius: 0.25rem;
}

.chat-area .nav-tabs .nav-item.show .nav-link,
.chat-area .nav-tabs .nav-link.active {
    color: #222;
    background-color: #fff;
    border-color: transparent transparent #000;
}

.chat-area .nav-tabs .nav-link:focus,
.chat-area .nav-tabs .nav-link:hover {
    border-color: transparent transparent #000;
    isolation: isolate;
}

.chat-list h3 {
    color: #222;
    font-size: 16px;
    font-weight: 500;
    line-height: 1.5;
    text-transform: capitalize;
    margin-bottom: 0;
}

.chat-list p {
    color: #343434;
    font-size: 14px;
    font-weight: 400;
    line-height: 1.5;
    text-transform: capitalize;
    margin-bottom: 0;
}

.chat-list a.d-flex {
    margin-bottom: 15px;
    position: relative;
    text-decoration: none;
}

.chat-list .active {
    display: block;
    content: '';
    clear: both;
    position: absolute;
    bottom: 3px;
    left: 34px;
    height: 12px;
    width: 12px;
    background: #00DB75;
    border-radius: 50%;
    border: 2px solid #fff;
}

.msg-head h3 {
    color: #222;
    font-size: 18px;
    font-weight: 600;
    line-height: 1.5;
    margin-bottom: 0;
}

.msg-head p {
    color: #343434;
    font-size: 14px;
    font-weight: 400;
    line-height: 1.5;
    text-transform: capitalize;
    margin-bottom: 0;
}

.msg-head {
    padding: 15px;
    border-bottom: 1px solid #ccc;
}

.moreoption {
    display: flex;
    align-items: center;
    justify-content: end;
}

.moreoption .navbar {
    padding: 0;
}

.moreoption li .nav-link {
    color: #222;
    font-size: 16px;
}

.moreoption .dropdown-toggle::after {
    display: none;
}

.moreoption .dropdown-menu[data-bs-popper] {
    top: 100%;
    left: auto;
    right: 0;
    margin-top: 0.125rem;
}

.msg-body ul {
    overflow: hidden;
}

.msg-body ul li {
    list-style: none;
    margin: 15px 0;
}

.msg-body ul li.sender {
    display: block;
    width: 100%;
    position: relative;
    margin-left: 15px;
}

.msg-body ul li.sender:before {
    display: block;
    clear: both;
    content: '';
    position: absolute;
    top: -6px;
    left: -7px;
    width: 0;
    height: 0;
    border-style: solid;
    border-width: 0 12px 15px 12px;
    border-color: transparent transparent #f5f5f5 transparent;
    -webkit-transform: rotate(-37deg);
    -ms-transform: rotate(-37deg);
    transform: rotate(-37deg);
}

.msg-body ul li.sender p {
    color: #000;
    font-size: 14px;
    line-height: 1.5;
    font-weight: 400;
    padding: 15px;
    background: #f5f5f5;
    display: inline-block;
    border-bottom-left-radius: 10px;
    border-top-right-radius: 10px;
    border-bottom-right-radius: 10px;
    margin-bottom: 0;
}

.msg-body ul li.sender p b {
    display: block;
    color: #180660;
    font-size: 14px;
    line-height: 1.5;
    font-weight: 500;
}

.msg-body ul li.repaly {
    display: block;
    width: 100%;
    text-align: right;
    position: relative;
    margin-left: -15px;
}

.msg-body ul li.repaly:before {
    display: block;
    clear: both;
    content: '';
    position: absolute;
    bottom: 15px;
    right: -7px;
    width: 0;
    height: 0;
    border-style: solid;
    border-width: 0 12px 15px 12px;
    border-color: transparent transparent #4b7bec transparent;
    -webkit-transform: rotate(37deg);
    -ms-transform: rotate(37deg);
    transform: rotate(37deg);
}

.msg-body ul li.repaly p {
    color: #fff;
    font-size: 14px;
    line-height: 1.5;
    font-weight: 400;
    padding: 15px;
    background: #00494f;
    display: inline-block;
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
    border-bottom-left-radius: 10px;
    margin-bottom: 0;
}

.msg-body ul li.repaly p b {
    display: block;
    color: #00494f;
    font-size: 14px;
    line-height: 1.5;
    font-weight: 500;
}

.msg-body ul li.repaly:after {
    display: block;
    content: '';
    clear: both;
}

.time {
    display: block;
    color: #000;
    font-size: 12px;
    line-height: 1.5;
    font-weight: 400;
}

li.repaly .time {
    margin-right: 20px;
}

.divider {
    position: relative;
    z-index: 1;
    text-align: center;
}

.msg-body h6 {
    text-align: center;
    font-weight: normal;
    font-size: 14px;
    line-height: 1.5;
    color: #222;
    background: #fff;
    display: inline-block;
    padding: 0 5px;
    margin-bottom: 0;
}

.divider:after {
    display: block;
    content: '';
    clear: both;
    position: absolute;
    top: 12px;
    left: 0;
    border-top: 1px solid #EBEBEB;
    width: 100%;
    height: 100%;
    z-index: -1;
}

.send-box {
    padding: 15px;
    border-top: 1px solid #ccc;
}

.send-box form {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 15px;
}

.send-box .form-control {
    display: block;
    width: 85%;
    padding: 0.375rem 0.75rem;
    font-size: 14px;
    font-weight: 400;
    line-height: 1.5;
    color: #222;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ccc;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    border-radius: 0.25rem;
    transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
}

.send-box button {
    border: none;
    background: #3867d6;
    padding: 0.375rem 5px;
    color: #fff;
    border-radius: 0.25rem;
    font-size: 14px;
    font-weight: 400;
    width: 24%;
    margin-left: 1%;
}

.send-box button i {
    margin-right: 5px;
}

.send-btns .button-wrapper {
    position: relative;
    width: 125px;
    height: auto;
    text-align: left;
    margin: 0 auto;
    display: block;
    background: #F6F7FA;
    border-radius: 3px;
    padding: 5px 15px;
    float: left;
    margin-right: 5px;
    margin-bottom: 5px;
    overflow: hidden;
}

.send-btns .button-wrapper span.label {
    position: relative;
    z-index: 1;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    width: 100%;
    cursor: pointer;
    color: #343945;
    font-weight: 400;
    text-transform: capitalize;
    font-size: 13px;
}

#upload {
    display: inline-block;
    position: absolute;
    z-index: 1;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    opacity: 0;
    cursor: pointer;
}

.send-btns .attach .form-control {
    display: inline-block;
    width: 120px;
    height: auto;
    padding: 5px 8px;
    font-size: 13px;
    font-weight: 400;
    line-height: 1.5;
    color: #343945;
    background-color: #F6F7FA;
    background-clip: padding-box;
    border: 1px solid #F6F7FA;
    border-radius: 3px;
    margin-bottom: 5px;
}

.send-btns .button-wrapper span.label img {
    margin-right: 5px;
}

.button-wrapper {
    position: relative;
    width: 100px;
    height: 100px;
    text-align: center;
    margin: 0 auto;
}

button:focus {
    outline: 0;
}

.add-apoint {
    display: inline-block;
    margin-left: 5px;
}

.add-apoint a {
    text-decoration: none;
    background: #F6F7FA;
    border-radius: 8px;
    padding: 8px 8px;
    font-size: 13px;
    font-weight: 400;
    line-height: 1.2;
    color: #343945;
}

.add-apoint a svg {
    margin-right: 5px;
}

.chat-icon {
    display: none;
}

.closess i {
    display: none;
}



@media (max-width: 767px) {
    .chat-icon {
        display: block;
        margin-right: 151px;
    }
    .chatlist {
        width: 100%;
    }
    .chatbox {
        width: 100%;
        position: absolute;
        left: 1000px;
        right: 0;
        background: #fff;
        transition: all 0.5s ease;
        border-left: none;
    }
    .showbox {
        left: 0 !important;
        transition: all 0.5s ease;
    }
    .msg-head h3 {
        font-size: 14px;
    }
    .msg-head p {
        font-size: 12px;
    }
    .msg-head .flex-shrink-0 img {
        height: 30px;
    }
    .send-box button {
        width: 28%;
    }
    .send-box .form-control {
        width: 70%;
    }
    .chat-list h3 {
        font-size: 14px;
    }
    .chat-list p {
        font-size: 12px;
    }
    .msg-body ul li.sender p {
        font-size: 13px;
        padding: 8px;
        border-bottom-left-radius: 6px;
        border-top-right-radius: 6px;
        border-bottom-right-radius: 6px;
    }
    .msg-body ul li.repaly p {
        font-size: 13px;
        padding: 8px;
        border-top-left-radius: 6px;
        border-top-right-radius: 6px;
        border-bottom-left-radius: 6px;
    }
    #product-info-popup{
        top: 40% !important;
        left: 53% !important;
    }
    #product-name{
        font-size: 12px !important;
    }
}

</style>
<section class="message-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="chat-area">
                    <!-- chatlist -->
                    <div class="chatlist">
                        <div class="modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <!-- chat-list -->
                                    <div class="chat-lists">
                                        <div class="tab-content" id="myTabContent">
                                            <div class="tab-pane fade show active" id="Open" role="tabpanel" aria-labelledby="Open-tab">
                                                <div class="chat-list" id="chat-list">
                                                    <!-- Dynamically populated chat list here -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- chatbox -->
                    <div class="chatbox" id="chat-box">
                        <div class="modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="msg-head" style="padding: 15px; background-color: #00494f;">
                                    <div class="row">
                                        <div class="col-8">
                                            <div class="d-flex align-items-center">
                                                <span class="chat-icon">
                                                    <img class="img-fluid" src="https://mehedihtml.com/chatbox/assets/img/arroleftt.svg" alt="image title" style="width: 20px; height: 20px;">
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-body">
                                    <div class="msg-body" id="message-body">
                                        <!-- Dynamically populated messages here -->
                                    </div>
                                </div>

                                <div class="send-box" style="padding: 10px; background-color: #f9f9f9;">
                                    <form id="send-message-form" action="javascript:void(0);" style="display: flex; align-items: center;">
                                        <input type="text" id="message-input" class="form-control" placeholder="Write message…" style="flex-grow: 1; border-radius: 20px; padding: 10px;">
                                        <button type="submit" style="border: none; background-color: transparent; margin-left: 10px; cursor: pointer;">
                                            <i class="fa fa-paper-plane" aria-hidden="true" style="font-size: 20px; color: #00494f;"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- chatbox -->
                </div>
            </div>
        </div>
    </div>
</section>



    <?php
    include_once 'footer.php';
    ?>
<script>








$(document).ready(function() {
        loadChatList();


        $(document).on('click', '.chat-list-item', function() {
            var conversationId = $(this).data('conversation-id');
            loadMessages(conversationId);
        });


        $('#send-message-form').submit(function(event) {
            event.preventDefault();
            var message = $('#message-input').val();
            var conversationId = $('#chat-box').data('conversation-id'); 

            if (message !== '') {
                sendMessage(conversationId, message);
            }
        });
    });


    function loadChatList() {
        $.ajax({
            url: '<?= $urlval?>ajax/fetch_conversations.php', 
            method: 'GET',
            success: function(response) {
                $('#chat-list').html(response);
            }
        });
    }

   
    function loadMessages(conversationId) {
    $.ajax({
        url: '<?= $urlval?>ajax/fetch_messages.php', 
        method: 'POST',
        data: { conversation_id: conversationId },
        success: function(response) {
            $('#message-body').html(response);
            if ($(window).width() <= 768) {
            $(".chatbox").addClass('showbox');
                }
            $('#chat-box').data('conversation-id', conversationId);
            // Auto-scroll to bottom
            $('#message-body').scrollTop($('#message-body')[0].scrollHeight);
        }
    });
}


    function sendMessage(conversationId, message) {
        $.ajax({
            url: '<?= $urlval?>ajax/send_message.php', 
            method: 'POST',
            data: {
                conversation_id: conversationId,
                message: message
            },
            success: function(response) {
                $('#message-input').val(''); 
                loadMessages(conversationId); 
            }
        });
    }
    $(".chat-icon").click(function() {
    $(".chatbox").removeClass('showbox');
});
    function hidepopup(){
        $('#popup-overlay').hide();
    $('#product-info-popup').hide();
    
    $('body').css('overflow', 'auto');
    }
    $(window).on('scroll', function() {
    var scrollThreshold = 600;

    if ($(window).scrollTop() > scrollThreshold) {
        hidepopup();
    }
});
</script>
</body>
</html>