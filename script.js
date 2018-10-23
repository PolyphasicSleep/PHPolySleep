function displaymorenav(){
    let rles = document.querySelectorAll(".navbartop>li>a:not(.active):not(.activeclickable):not(.more)");
    length = rles.length;
    let x;
    if(rles[0].style.display !== "block"){
        for (x = 0; x< length; x++){
            rles[x].style.display = "block";
        }
    } else {
        for (x = 0; x< length; x++){
            rles[x].style.display = "none";
        }
    }
}