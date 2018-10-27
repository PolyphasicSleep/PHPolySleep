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

function displaymenu(node, affectcallingelement){
    let relmenu = node;
    if(node.innerHTML === "Collapse"){
        node.innerHTML = "Expand";
    } else if (node.innerHTML === "Expand"){
        node.innerHTML = "Collapse";
    }
    while (relmenu.tagName !== "UL") {
        relmenu = relmenu.parentNode;
    }
    if (affectcallingelement){
        relmenu.style.display = "none"
    } else {
        let menuitems = relmenu.children;
        let length = menuitems.length;
        let x;
        for(x = 0; x < length; x++) {
            let item = menuitems[x];

            /* colors active menu items */
            let activeElements = document.querySelectorAll(".active:not(.title):not(.menutitle),.activeclickable:not(.title):not(.menutitle)");
            let actlength = activeElements.length;
            let y;
            for (y = 0; y < actlength; y++) {
                let act = activeElements[y];
                if (item.contains(act)) {
                    item.style.backgroundColor = "darkblue";
                    let text = item.querySelectorAll("a"); //get <a> elements inside menu item
                    let textcnt = text.length;
                    let z;
                    for(z = 0; z < textcnt; z++){
                        if(text[z].parentNode.contains(act))
                            text[z].style.color = "white";              //color text white
                    }
                }
            }

            // shows / hides menu items
            if (item.contains(node)){

            } else {
                if (item.style.display === "block"){
                    item.style.display = "none";
                } else {
                    item.style.display = "block";
                }

            }
        }
    }

}

function displaysubmenu(node){
    let parent = node.parentNode;
    let relmenu = (parent.getElementsByTagName("ul"))[0];
    if(relmenu.style.display !== "block"){
        relmenu.style.display = "block";
        parent.querySelector("a.phoneplus").innerHTML = "&#x25B2";
    } else {
        relmenu.style.display = "none";
        parent.querySelector("a.phoneplus").innerHTML = "&#x25BC";
    }
}

function saveSchedule(schedule){
    let button = document.getElementById("selectSched");
    button.innerHTML = "Processing...";
    let request = new XMLHttpRequest();
    request.open("POST", "/executables/saveschedule.php", true);
    request.onreadystatechange = function(){
        if(this.readyState === 4 && this.status === 200){
            //Successfully executed php file
            button.innerHTML = "Edit schedule";
            button.onclick = editSchedule();
        }
    }
    //Send the proper header information along with the request
    request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    request.send('schedule='+schedule);
}

function editSchedule(){

}

function showScheduleEditor(boolean){
    let display = document.getElementById("timesdisplay");
    let editor = document.getElementById("timesEditor");
    if(boolean){
        display.style.display = "none";
        editor.style.display = "block";
    } else {
        display.style.display = "block";
        editor.style.display = "none";
    }
}