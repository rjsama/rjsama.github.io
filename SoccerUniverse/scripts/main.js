// HTML elements
const mobileNavBtn = document.getElementById('hamburger-icon');
let mobileNav = document.getElementById('mobile-nav');
let mobileBodyCover = document.getElementById('mobile-body-cover');
const closeBtn = document.getElementById('close');
let sliderImages = document.getElementsByClassName('slider-image');
let dots = document.getElementsByClassName("dot");

// Variables
let sliderCounter = 0;
let weeks = 15;
let days = 10;
let phonePattern = /^\d{3}-\d{3}-\d{4}$/;

//Arrays
let eplArr = [{
    "crestLeft": "images/chelsea.png",
    "altLeft": "chelsea football club crest",
    "teamLeft": "Chelsea FC",
    "score": "3:2",
    "crestRight": "images/liverpool.png",
    "altRight": "liverpool football club crest",
    "teamRight": "Chelsea FC"
},
{
    "crestLeft": "images/MU.png",
    "altLeft": "manchester united football club crest",
    "teamLeft": "Manchester United FC",
    "score": "2:2",
    "crestRight": "images/MC.png",
    "altRight": "manchester city football club crest",
    "teamRight": "Manchester City FC"
},
{
    "crestLeft": "images/arsenal.png",
    "altLeft": "arsenal football club crest",
    "teamLeft": "Arsenal FC",
    "score": "2:1",
    "crestRight": "images/tottenham.png",
    "altRight": "tottenham football club crest",
    "teamRight": "Tottenham FC"
},
{
    "crestLeft": "images/leicester.png",
    "altLeft": "leicester city football club crest",
    "teamLeft": "Leicester city FC",
    "score": "1:2",
    "crestRight": "images/swansea.png",
    "altRight": "swansea football club crest",
    "teamRight": "Swansea FC"
}];

let splArr = [{
    "crestLeft": "images/barcelona.png",
    "altLeft": "barcelona football club crest",
    "teamLeft": "FC Barcelona",
    "score": "2:2",
    "crestRight": "images/realmadrid.png",
    "altRight": "real madrid football club crest",
    "teamRight": "Real Madrid CF"
},
{
    "crestLeft": "images/athleticclub.png",
    "altLeft": "Atletico Madrid football club crest",
    "teamLeft": "Atletico Madrid FC",
    "score": "4:2",
    "crestRight": "images/sevilla.png",
    "altRight": "sevilla football club crest",
    "teamRight": "Sevilla FC"
},
{
    "crestLeft": "images/deportivo.png",
    "altLeft": "deportivo football club crest",
    "teamLeft": "Real Club Deportivo",
    "score": "3:2",
    "crestRight": "images/getafe.png",
    "altRight": "getafe football club crest",
    "teamRight": "Getafe CF"
},
{
    "crestLeft": "images/villareal.png",
    "altLeft": "villareal football club crest",
    "teamLeft": "Villarreal CF",
    "score": "2:4",
    "crestRight": "images/valencia.png",
    "altRight": "valencia football club crest",
    "teamRight": "Valencia CF"
}];

let iplArr = [{
    "crestLeft": "images/juventus.png",
    "altLeft": "juventus football club crest",
    "teamLeft": "Juventus",
    "score": "3:1",
    "crestRight": "images/asroma.png",
    "altRight": "asroma football club crest",
    "teamRight": "AS Roma"
},
{
    "crestLeft": "images/acmilan.png",
    "altLeft": "ac milan football club crest",
    "teamLeft": "AC Milan FC",
    "score": "2:1",
    "crestRight": "images/intermilan.png",
    "altRight": "inter milan football club crest",
    "teamRight": "Inter Milan FC"
},
{
    "crestLeft": "images/lazio.png",
    "altLeft": "lazio football club crest",
    "teamLeft": "SS Lazio",
    "score": "2:1",
    "crestRight": "images/napoli.png",
    "altRight": "napoli football club crest",
    "teamRight": "SSC Napoli"
},
{
    "crestLeft": "images/parma.png",
    "altLeft": "parma football club crest",
    "teamLeft": "Parma",
    "score": "3:2",
    "crestRight": "images/samporia.png",
    "altRight": "Sampdoria football club crest",
    "teamRight": "UC Sampdoria"
}];

//Function to display navigation for mobile display
function showMobileNav(){
    mobileNavBtn.style.display = "none";
    mobileNav.style.left = "490px";
    mobileBodyCover.style.display = "block";
}

//Function to hide navigation for mobile display
function hideMobileNav(){
    mobileNavBtn.style.display = "flex";
    mobileNav.style.left = "770px";
    mobileBodyCover.style.display = "none";
}

$(document).ready(function(){
    //Hover effects for cards
    $('#iCard1').mouseenter(function(event){
        $('#h2-c1').addClass("showText");
        $('#p-c1').addClass("showText");
    });

    $('#iCard1').mouseleave(function(event){
        $('#h2-c1').removeClass("showText");
        $('#p-c1').removeClass("showText");
    });

    $('#iCard2').mouseenter(function(event){
        $('#h2-c2').addClass("showText");
        $('#p-c2').addClass("showText");
    });

    $('#iCard2').mouseleave(function(event){
        $('#h2-c2').removeClass("showText");
        $('#p-c2').removeClass("showText");
    });

    $('#iCard3').mouseenter(function(event){
        $('#h2-c3').addClass("showText");
        $('#p-c3').addClass("showText");
    });

    $('#iCard3').mouseleave(function(event){
        $('#h2-c3').removeClass("showText");
        $('#p-c3').removeClass("showText");
    });
    
    //Function for updating clock
    function updateNextMatchClock(){
        let now = new Date();
        let hours = now.getHours();
        let minutes = now.getMinutes();
        let seconds = now.getSeconds();
        hours = (hours === 0 ) ? hours + 12 : hours;
        hours = (hours > 12) ? hours % 12 : hours;
        $('#nmWeeks').text(padDigit(weeks));
        $('#nmDays').text(padDigit(days));
        $('#nmHrs').text(padDigit(hours));
        $('#nmMins').text(padDigit(minutes));
        $('#nmSec').text(padDigit(seconds));
    }

    function updatesDays(){
        --days;
    }
    
    function updatesWeeks(){
        --weeks;
    }

    setInterval(updateNextMatchClock,1000);
    setInterval(updatesDays,8640000);
    setInterval(updatesWeeks,60480000);
    
    function padDigit(digit){
        if(digit < 10){
            return ("0" + digit);
        }
        else{
            return digit;
        } 
    }
    
    //Accordion function
    $(function() {
        try{
            $("#accordion").accordion();
        }
        catch(ex){
            //do nothing
        }
    });

    //Slider function (IIFE)
    showSlides();

    function showSlides() {
        let i;
        if(sliderImages != undefined && sliderImages.length > 0){
            for (i = 0; i < sliderImages.length; i++) {
                sliderImages[i].style.display = "none";  
            }
            sliderCounter++;
            if (sliderCounter > sliderImages.length) {
                sliderCounter = 1
            }    
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            sliderImages[sliderCounter-1].style.display = "block";  
            dots[sliderCounter-1].className += " active";
            setTimeout(showSlides, 2000);
        }
    }

    //Form validations on submit
    $('form').submit(function (event){
        let isValid = true;
        var emailPattern = /\b[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}\b/;

        if($('#txtName').val().trim() == "" || $('#txtName').val().trim() == null || $('#txtName').val().trim() == undefined){
            $('#txtName').focus();
            $('#txtName').next().text("This field is required");
            isValid = false;
        }
        else if($('#txtEmail').val().trim() == "" || $('#txtEmail').val().trim() == null || $('#txtEmail').val().trim() == undefined){
            $('#txtEmail').focus();
            $('#txtEmail').next().text("This field is required");
            isValid = false;
        }
        else if(!emailPattern.test($('#txtEmail').val().trim())) {
			$("#txtEmail").next().text("Must be a valid email address");
			isValid = false;
			emailValid = false;
        }
        else if(!phonePattern.test($('#txtPhn').val().trim())){
            $('#txtPhn').focus();
            $('#txtPhn').next().text("Please enter a valid phone number");
            isValid = false;
        }
        else if($('#txtComments').val().trim() == "" || $('#txtComments').val().trim() == null || $('#txtComments').val().trim() == undefined){
            $('#txtComments').focus();
            $('#txtComments').next().text("This field is required");
            isValid = false;
        }
        else{
            isValid = true;
        }

        if (isValid == false) {
			event.preventDefault(); 
        }
        else{
            $('#txtName').next().text("");
            $('#txtEmail').next().text("");
            $('#txtComments').next().text("");
            $('#txtPhn').next().text("");
        }
    });

    //Form validations when input goes out of focus
    $('#txtName').focusout(function(event){
        if($(this).val().trim() != ""){
            $(this).next().text("");
        }
        else{
            $(this).next().text("This field is required");
        }
    });

    $('#txtEmail').focusout(function(event){
        if($(this).val().trim() != ""){
            $(this).next().text("");
        }
        else{
            $(this).next().text("This field is required");
        }
    });

    $('#txtComments').focusout(function(event){
        if($(this).val().trim() != ""){
            $(this).next().text("");
        }
        else{
            $(this).next().text("This field is required");
        }
    });

    $('#txtPhn').focusout(function(event){
        if($(this).val().trim() != ""){
            if(phonePattern.test($(this).val().trim())){
                $(this).next().text("");
            }
            else{
                $(this).next().text("Please enter a valid phone number");
            }
        }
    });

    //Function for changing displayed teams
    $("#league-btns a").click(function() {
        let selectedLeague = $(this).attr("title");
        let data=[];
        switch(selectedLeague){
            case "spl":
                data = splArr;
                break;
            case "ipl":
                data = iplArr;
                break;
            default:
                data = eplArr;
                break;
        }

        let html = "";

        for(let i = 0; i < data.length; i++){
            html += 
            "<div id=\"team-scores\"><div id=\"team-crest-left\"><div id=\"crest-img\">" +
            "<img src=\"" + data[i].crestLeft + "\" alt=\"" + data[i].altLeft + "\"></div>" +
            "<p>" + data[i].teamLeft + "</p></div><div id=\"match-scr\">" +
            "<p>" + data[i].score + "</p></div><div id=\"team-crest-right\">" +
            "<p>" + data[i].teamRight + "</p><div id=\"crest-img\">" +
            "<img src=\"" + data[i].crestRight + "\" alt=\"" + data[i].altRight + "\">" +
            "</div></div></div>";
        }

        document.getElementById('league-scores').innerHTML = html;
    });
});

mobileNavBtn.onclick = showMobileNav;
closeBtn.onclick = hideMobileNav;