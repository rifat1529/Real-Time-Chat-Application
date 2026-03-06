function sendMessage(){

let msg = document.getElementById("message").value;

/* empty message check */
if(msg.trim() === ""){
return;
}

fetch("send_message.php",{

method:"POST",

headers:{
"Content-Type":"application/x-www-form-urlencoded"
},

body:"message="+encodeURIComponent(msg)+"&receiver="+receiver

})
.then(res => res.text())
.then(data => {

document.getElementById("message").value="";
loadMessages(); // reload chat after send

});

}

function loadMessages(){

fetch("get_messages.php?receiver="+receiver)

.then(res=>res.text())

.then(data=>{

document.getElementById("chat-box").innerHTML=data;

});

}

/* load messages immediately */
loadMessages();

/* auto refresh every second */
setInterval(loadMessages,1000);