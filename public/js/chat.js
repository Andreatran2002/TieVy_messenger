 // Enable pusher logging - don't include this in production
 Pusher.logToConsole = true;

 var pusher = new Pusher('6d26d8d2ff0bf9b79d49', {
     cluster: 'ap1'
 });

 var channel = pusher.subscribe('my-channel');
 channel.bind('my-event', function(data) {
     // alert(JSON.stringify(data));

     if (data['request'] == "message") {
         var username = getcookie("messageUser");
         var output = "";
         $.post("./Ajax/updateMessage", {
             receiver: receiver
         }, function(data) {

             var response = data.split("\n");
             var rl = response.length;
             var item = "";
             for (var i = 0; i < rl; i++) {
                 item = response[i].split('\\')
                 if (item[1] != undefined) {
                     if (item[0] == username) {
                         output += "<div class=\"body__chatBox-msgArea-item sent\">" + item[1] + " </div>";
                     } else {
                         output += "<div class=\"body__chatBox-msgArea-item receive\">" + item[1] + " </div>";
                     }
                 }
             }
             $("#message__area").html(output);
             message__area.scrollTop = message__area.scrollHeight;
         });
     }


 });