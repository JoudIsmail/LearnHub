const localStorageClicked = localStorage.getItem("anchor");

const localStorageFont = localStorage.getItem("font");
    if(localStorageFont !==null && localStorageFont === "dys-font"){
        document.body.className = "dys-font body_kaufnachricht";
    }else{
        document.body.className = "normal body_kaufnachricht";
    }
