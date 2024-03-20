const msgBox = document.querySelector(".msg-box");
if(msgBox){
    setTimeout(() => {
        msgBox.style.opacity = '0';
        msgBox.style.transition = "opacity 0.3s linear";
    }, 3000)
}