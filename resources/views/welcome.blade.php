<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Chat App socket.io</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        
        <style>
            .chat-row {
                margin: 50px; 
            }

            ul {
                margin: 0;
                padding: 0;
                list-style: none;
            }

            ul li {
                padding: 8px;
                background: #928787;
                margin-bottom: 20px;
            }

            ul li:nth-child(2n-n) {
                background: #c3c5c5;
            }

            .chat-input {
                border: 1px solid lightgray;
                /* border-top-right-radius: 10px; */
                /* border-top-left-radius: 10px; */
                border-radius: 10px;
                padding: 8px 10px;
            }
        </style>
    </head>
    <body>
        
        <div class="container">
            <div class="row chat-row">
                <div class="chat-content">
                    <ul>
                        <li>adsasd</li>
                    </ul>
                </div>

                <div class="chat-section">
                    <div class="chat-box">
                        <div class="chat-input bg-white" id="chatInput" contenteditable="">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        

        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <script src="https://cdn.socket.io/4.3.2/socket.io.min.js" integrity="sha384-KAZ4DtjNhLChOB/hxXuKqhMLYvx3b5MlT55xPEiNmREKRzeEm+RVPlTnAn0ajQNs" crossorigin="anonymous"></script>


        <script>
            $(function() {
                let ip_address = '127.0.0.1';
                let socket_port = '3000';
                let socket = io(ip_address + ':' + socket_port);

                // socket.on('connection');

                let chatInput = $('#chatInput');

                chatInput.keypress(function(e) {
                    let message = $(this).html();
                    console.log(message);
                    if(e.which === 13 && !e.shiftKey){
                        socket.emit('sendChatToServer', message);
                        chatInput.html();
                        return false;
                    }
                });

                socket.on('sendChatToClient', (message) => {
                    $('.chat-content ul').append(`<li>${message}</li>`);
                });
            });
        </script>
    </body>
</html>
