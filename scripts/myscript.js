function subscribe12(){
    //document.getElementById("show").style.display = "block";
    // document.body.scrollTop = 0;
    // document.documentElement.scrollTop = 0;
    
    
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("show").style.display = "block";
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }
    };
    xhttp.open("POST", "subscribe.php", true);
    xhttp.send();

}

function closePopup(){
    document.getElementById("show").style.display = "none";
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}