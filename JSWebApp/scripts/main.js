// Created By Rajat Mahajan
//Menu Buttons
const dashboardBtn  = document.getElementById('dashboard');
const addEventBtn  = document.getElementById('addEvent');
const addNoteBtn  = document.getElementById('note');
const addContactBtn  = document.getElementById('contact');

//SignUp and Login
const signupBtn = document.getElementById('dashboard');

//Sections
let dashboardSection = document.getElementById('dbSection');
let eventsSection = document.getElementById('db_events');
let notesSection = document.getElementById('db_notes');
let contactsSection = document.getElementById('db_contacts');
let addEventSection = document.getElementById('eventSection');
let addNoteSection = document.getElementById('noteSection');
let addContactSection = document.getElementById('contactSection');

// Event Form
let _eventName = document.getElementById('txtEN');
let _eventDate = document.getElementById('txtDate');
let _eventTime = document.getElementById('txtTime');
let _eventPriority = document.getElementById('selPriority');
let _eventDesc = document.getElementById('txtDesc');
let _selEvents = document.getElementById('selEvents');
const createEventBtn  = document.getElementById('btnCreateEvent');

// Note Form
let _noteTitle = document.getElementById('txtNote');
let _noteDesc = document.getElementById('txtNoteDesc');
let _selNotes = document.getElementById('selNotes');
const createNoteBtn  = document.getElementById('btnCreateNote');

// Contact Form
let _contactName = document.getElementById('txtName');
let _contactNum = document.getElementById('txtPhone');
let _contactEmail = document.getElementById('txtCEmail');
let _contactOrg = document.getElementById('txtOrg');
let _selContacts = document.getElementById('selContacts');
const createContactBtn  = document.getElementById('btnCreateContact');

// Arrays
let eventArr = [];
let noteArr = [];
let contactArr = [];

//variables
let eIndex = 1;
let nIndex = 1;
let cIndex = 1;
let currentDate = "";
let currentTime = "";

function showDashboard(){
    dashboardSection.style.display = "block";
    addEventSection.style.display = "none";
    addNoteSection.style.display = "none";
    addContactSection.style.display = "none";
}

function showAddEvent(){
    dashboardSection.style.display = "none";
    addEventSection.style.display = "block";
    addNoteSection.style.display = "none";
    addContactSection.style.display = "none";
    currentDate = new Date();
    let date = (currentDate.getDate().toString().length == 1) ? "0" + currentDate.getDate() : currentDate.getDate();
    let month = (currentDate.getMonth()+1);
    month = (month.toString().length == 1) ? "0" + month : month;
    currentDate = currentDate.getFullYear() + '-' + month + '-' + date;
    _eventDate.value = currentDate;
    _eventDate.setAttribute("min",currentDate);
    currentTime = new Date();
    let hours = (currentTime.getHours().toString().length == 1)? "0" + currentTime.getHours() : currentTime.getHours();
    let minutes = (currentTime.getMinutes().toString().length == 1)? "0" + currentTime.getMinutes() : currentTime.getMinutes();
    currentTime = hours + ':' + minutes;
    _eventTime.value = currentTime;
    _eventTime.setAttribute("min",currentTime);
}

function showAddNote(){
    dashboardSection.style.display = "none";
    addEventSection.style.display = "none";
    addNoteSection.style.display = "block";
    addContactSection.style.display = "none";
}

function showAddContact(){
    dashboardSection.style.display = "none";
    addEventSection.style.display = "none";
    addNoteSection.style.display = "none";
    addContactSection.style.display = "block";
}

function createEvent(){
    if(_eventName.value != "" && _eventDate.value != "" && _eventDesc.value != ""){
        let event = {};
        event.ID = eIndex;
        event.EventName = _eventName.value;
        event.EventDate = _eventDate.value;
        event.EventTime = _eventTime.value;
        event.EventPriority = _eventPriority.value;
        event.EventDesc = _eventDesc.value;
        eventArr.push(event);
        ++eIndex;
        return true;
    }
    else{
        return false;
    }
}

function createNote(){
    if(_noteTitle.value != "" && _noteDesc.value != ""){
        let note = {};
        note.ID = nIndex;
        note.NoteTitle = _noteTitle.value;
        note.NoteDesc = _noteDesc.value;
        noteArr.push(note);
        ++nIndex;
        return true;
    }
    else{
        return false;
    }
}

function createContact(){
    if(_contactName.value != "" && _contactNum.value != ""){
        let contact = {};
        contact.ID = cIndex;
        contact.ContactName = _contactName.value;
        contact.ContactNum = _contactNum.value;
        contact.ContactEmail = (_contactEmail.value != "")?_contactEmail.value:"";
        contact.ContactOrg = (_contactOrg.value != "")?_contactOrg.value:"";
        contactArr.push(contact);
        ++cIndex;
        return true;
    }
    else{
        return false;
    }
}

$(document).ready(function(){
    $("#loginForm").submit(function(event){
        let isValid = true;
        if($("#txtUN").val() === "123" && $("#txtPswd").val() === "123"){
            //login success
            $('.loginErrMsg').css("display","none");
            isValid = true;
        }
        else{
            $('.loginErrMsg').css("display","block");
            isValid = false;
        }

        if(!isValid){
            event.preventDefault();
        }
    });

    $("#btnCreateEvent").click(function() {
        if(createEvent()){
            updateEventsDiv();
            resetEventForm();
            showDashboard();
        }
        else{
            $(".errMsg").css("display","block");
        }
    });

    function updateEventsDiv(){
        if(eventArr.length > 0){
            for(let x = 0; x < eventArr.length; x++){
                if(x == 0){
                    $("#eventsDiv").html(
                        "<div class=\"eventCard\"" + ">" + "<h4 class=" + eventArr[x].EventPriority + ">" + 
                        eventArr[x].EventName + "</h4>" + "<p>" + eventArr[x].EventDate + "</p>" + "<p>" + 
                        eventArr[x].EventTime + "</p>" + "<p>" + eventArr[x].EventDesc + "</p>" + "</div>"
                    );

                    $("#selEvents").html(
                        "<option" + " value=\"" + eventArr[x].ID + "\"" + "selected >" + eventArr[x].EventName + "</option>"
                    );
                }
                else{
                    $("#eventsDiv").append(
                        "<div class=\"eventCard\"" + ">" + "<h4 class=" + eventArr[x].EventPriority + ">" + 
                        eventArr[x].EventName + "</h4>" + "<p>" + eventArr[x].EventDate + "</p>" + "<p>" + 
                        eventArr[x].EventTime + "</p>" + "<p>" + eventArr[x].EventDesc + "</p>" + "</div>"
                    );

                    $("#selEvents").append(
                        "<option" + " value=\"" + eventArr[x].ID + "\"" + ">" + eventArr[x].EventName + "</option>"
                    );
                }
            }
            $("#delEventsDiv").css("display","flex");
        }
        else{
            $("#eventsDiv").html("");
            $("#selEvents").html("");
            $("#delEventsDiv").css("display","none");
        }
    }

    $("#btnCreateNote").click(function() {
        if(createNote()){
            updateNotesDiv();
            resetNoteForm();
            showDashboard();
        }
        else{
            $(".errMsg").css("display","block");
        }
    });

    function updateNotesDiv(){
        if(noteArr.length > 0){
            for(let y = 0; y < noteArr.length; y++){
                if(y == 0){
                    $("#notesDiv").html(
                        "<div class=\"noteCard\"" + ">" + "<h4>" + noteArr[y].NoteTitle + "</h4>" + 
                        "<p>" + noteArr[y].NoteDesc + "</p>" + "</div>"
                    );

                    $("#selNotes").html(
                        "<option" + " value=\"" + noteArr[y].ID + "\"" + "selected >" + noteArr[y].NoteTitle + "</option>"
                    );
                }
                else{
                    $("#notesDiv").append(
                        "<div class=\"noteCard\"" + ">" + "<h4>" + noteArr[y].NoteTitle + "</h4>" + 
                        "<p>" + noteArr[y].NoteDesc + "</p>" + "</div>"
                    );

                    $("#selNotes").append(
                        "<option" + " value=\"" + noteArr[y].ID + "\"" + ">" + noteArr[y].NoteTitle + "</option>"
                    );
                }
            }
            $("#delNotesDiv").css("display","flex");
        }
        else{
            $("#notesDiv").html("");
            $("#selNotes").html("");
            $("#delNotesDiv").css("display","none");
        }
    }

    $("#btnCreateContact").click(function() {
        if(createContact()){
            updateContactsDiv();
            resetContactForm();
            showDashboard();
        }
        else{
            $(".errMsg").css("display","block");
        }
    });

    function updateContactsDiv(){
        if(contactArr.length > 0){
            for(let z = 0; z < contactArr.length; z++){
                if(z == 0){
                    $("#contactsDiv").html(
                        "<div class=\"contactCard\"" + ">" + "<h4>" + contactArr[z].ContactName + "</h4>" + 
                        "<p>" + contactArr[z].ContactNum + "</p>" + "<p>" + contactArr[z].ContactEmail + "</p>" + 
                        "<p>" + contactArr[z].ContactOrg + "</p>" + "</div>"
                    );

                    $("#selContacts").html(
                        "<option" + " value=\"" + contactArr[z].ID + "\"" + "selected >" + contactArr[z].ContactName + "</option>"
                    );
                }
                else{
                    $("#contactsDiv").append(
                        "<div class=\"contactCard\"" + ">" + "<h4>" + contactArr[z].ContactName + "</h4>" + 
                        "<p>" + contactArr[z].ContactNum + "</p>" + "<p>" + contactArr[z].ContactEmail + "</p>" + 
                        "<p>" + contactArr[z].ContactOrg + "</p>" + "</div>"
                    );

                    $("#selContacts").append(
                        "<option" + " value=\"" + contactArr[z].ID + "\"" + ">" + contactArr[z].ContactName + "</option>"
                    );
                }
            }
            $("#delContactsDiv").css("display","flex");
        }
        else{
            $("#contactsDiv").html("");
            $("#selContacts").html("");
            $("#delContactsDiv").css("display","none");
        }
    }

    $('#delEvent').click(function(){
        let selectedEvent = $('#selEvents').val();
        if(eventArr.length > 0){
            let reqdIndex = getIndexInArr(eventArr,selectedEvent);
            if(reqdIndex >= 0){
                eventArr.splice(reqdIndex,1);
                --eIndex;
            }
        }
        updateEventsDiv();
    });

    $('#delNote').click(function(){
        let selectedNote = $("#selNotes").val();
        if(noteArr.length > 0){
            let reqdIndex = getIndexInArr(noteArr,selectedNote);
            if(reqdIndex >= 0){
                noteArr.splice(reqdIndex,1);
                --nIndex;
            }
        }
        updateNotesDiv();
    });

    $('#delContact').click(function(){
        let selectedContact = $("#selContacts").val();
        if(contactArr.length > 0){
            let reqdIndex = getIndexInArr(contactArr,selectedContact);
            if(reqdIndex >= 0){
                contactArr.splice(reqdIndex,1);
                --cIndex;
            }
        }
        updateContactsDiv();
    });

    function getIndexInArr(inputArr, selectedId){
        if(inputArr.length > 0){
            for(let k = 0; k < inputArr.length; k++){
                if(inputArr[k].ID.toString() === selectedId.toString()){
                    return k;
                }
            }
            return -1;
        }
        else{
            return -1;
        }
    }

    $('#btnEReset').click(function(){
        resetEventForm();
    });

    $('#btnNReset').click(function(){
        resetNoteForm();
    });

    $('#btnCReset').click(function(){
        resetContactForm();
    });
});

function resetEventForm(){
    _eventName.value = "";
    let todayDate = new Date();
    _eventDate.value = currentDate;
    _eventTime.value = currentTime;
    _eventPriority.value = "medium";
    _eventDesc.value = "";
    $(".errMsg").css("display","none");
}

function resetNoteForm(){
    _noteTitle.value = "";
    _noteDesc.value = "";
    $(".errMsg").css("display","none");
}

function resetContactForm(){
    _contactName.value = "";
    _contactNum.value = "";
    _contactEmail.value = "";
    _contactOrg.value = "";
    $(".errMsg").css("display","none");

    // $('#dashboard').click(function (){
    //     showDashboard();
    // });

    // $('#addEvent').click(function (){
    //     showAddEvent();
    // });

    // $('#note').click(function (){
    //     showAddNote();
    // });

    // $('#contact').click(function (){
    //     showAddContact();
    // });
}

dashboardBtn.onclick = showDashboard;
addEventBtn.onclick = showAddEvent;
addNoteBtn.onclick = showAddNote;
addContactBtn.onclick = showAddContact;