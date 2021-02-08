var elem1 = document.getElementById("item1");
var elem2 = document.getElementById("item2");
var elem1Active = true;

var myVar = setInterval(myTimer, 5000);

function myTimer() {
  if(elem1Active){
    elem1.style.marginLeft = "-50%";
    elem1Active = false;
  }else{
    elem1.style.marginLeft = "0px";
    elem1Active = true;
  }
}