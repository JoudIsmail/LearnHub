const fontSwithcer = document.getElementById("change-font");

fontSwithcer.clicked;

function isClicked(){
    const localStorageClicked = localStorage.getItem("anchor");
    if(localStorageClicked !==null && localStorageClicked === "true"){
        return fontSwithcer.clicked = false;
    }else{
        return fontSwithcer.clicked = true;
    }
}

function clickHandler(){
    isClicked();
    if(this.clicked){
        document.querySelector('body').classList.remove('normal');
        document.querySelector('body').classList.add('dys-font');
        localStorage.setItem("font", "dys-font");
        localStorage.setItem("anchor", "true");
    } else{
        document.querySelector('body').classList.remove('dys-font');
        document.querySelector('body').classList.add('normal');
        localStorage.setItem("font", "normal");
        localStorage.setItem("anchor", "false");
    }
}
fontSwithcer.addEventListener("click", clickHandler);



window.onload = checkFont();

function checkFont(){
    const localStorageFont = localStorage.getItem("font");
    if(localStorageFont !==null && localStorageFont === "dys-font"){
        document.body.className = localStorageFont;
    }else{
        document.body.className = "normal";
    }
}