var menuActive = false;
var navbar = document.querySelector("#nav");
var toggle = () => {
    navbar.classList.toggle("active");
};


var currActiveMenu = "#donateAccordian";

$("#faq-selector").change(function () {
    if($(this).val() == 1){
        document.querySelector(currActiveMenu).classList.add("hide");
        document.querySelector("#donateAccordian").classList.toggle("hide");
        currActiveMenu = "#donateAccordian";
    }else if($(this).val() == 2){
        document.querySelector(currActiveMenu).classList.add("hide");
        document.querySelector("#supportAccordian").classList.toggle("hide");
        currActiveMenu = "#supportAccordian";
    }else if($(this).val() == 3){
        document.querySelector(currActiveMenu).classList.add("hide");
        document.querySelector("#volunteerAccordian").classList.toggle("hide");
        currActiveMenu = "#volunteerAccordian";
    }else{

    }
    /*var menu = document.querySelector("#" + menuId);
    var currmenu = document.querySelector("#" + currActiveMenu);
    menu.classList.toggle("hide");*/
});
