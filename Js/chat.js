function sendMessage(){

let msg = document.getElementById("message").value;

if(msg.trim()==""){
return;
}

fetch("send_message.php",{

method:"POST",

headers:{
"Content-Type":"application/x-www-form-urlencoded"
},

body:"message="+encodeURIComponent(msg)+"&receiver="+receiver

})
.then(res=>res.text())
.then(data=>{

document.getElementById("message").value="";
loadMessages();

});

}

function loadMessages(){

fetch("get_messages.php?receiver="+receiver)

.then(res=>res.text())

.then(data=>{

document.getElementById("chat-box").innerHTML=data;

});

}

loadMessages();

setInterval(loadMessages,1000);