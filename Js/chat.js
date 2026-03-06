function sendMessage(){

let msg = document.getElementById("message").value;

fetch("send_message.php",{

method:"POST",
headers:{
"Content-Type":"application/x-www-form-urlencoded"
},

body:"message="+msg+"&receiver="+receiver

});

document.getElementById("message").value="";
}

function loadMessages(){

fetch("get_messages.php?receiver="+receiver)

.then(res=>res.text())

.then(data=>{

document.getElementById("chat-box").innerHTML=data;

});

}

setInterval(loadMessages,1000);