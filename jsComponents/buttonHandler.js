//changes page depending on the button clicked
function changePage(e){
    var target = e.target;
    var actionName = target.id;

    switch(actionName){
        case "Home":
            actionName = "index";
            break;
        case "logout":
            //returns to index for now
            actionName = "index";
            break;
        default:

    }

    //path to page
    window.location.href = actionName + ".html";
}



//configures event listeners for all buttons
var buttonMenu = document.getElementsByTagName('button');
for(i = 0; i < buttonMenu.length; i++){
    //a switch statement could be added here to assign different functins to the buttons depending on the button's class
    buttonMenu[i].addEventListener("click", changePage);
}
