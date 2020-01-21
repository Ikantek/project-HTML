function actualizeDate() {
    var field = document.getElementById('date');    
    var actualDate = new Date();
    var day = actualDate.getDate();
    if (day < 10) {
        day = '0' + day;
    }
    var month = actualDate.getMonth() + 1;
    if (month < 10) {
        month = '0' + month;
    }
    var year = actualDate.getFullYear();
    var finalDate = year + '-' + month + '-' + day;
    field.value = finalDate;
}

function validateDate() {
    var field = document.getElementById('date').value;
    var dateSplit = field.split('-');
    var now = new Date();
    var parsed = new Date(dateSplit[0], parseInt(dateSplit[1]) - 1, parseInt(dateSplit[2]));
    var dateValidationRegex = /^\d{4}\-(0[1-9]|1[012])\-(0[1-9]|[12][0-9]|3[01])$/gi;
    if (!dateValidationRegex.test(field) || parsed>now) {
        actualizeDate();
    }
}

function actualizeHour() {
    var field = document.getElementById('time');
    var actualDate = new Date();
    var hour = actualDate.getHours();
    var minutes = actualDate.getMinutes();
    if (minutes < 10) {
        minutes = '0' + minutes;
    }
    field.value = hour + ":" + minutes;
}

function validateHour() {
    var field = document.getElementById('time').value;
    var regexp_godziny = /^([0-9]|0[0-9]|1[0-9]|2[0-3]):[0-5][0-9]$/gi;
    if (!regexp_godziny.test(field)) {
        actualizeHour();
    }
}

function listOfAttachments() {
    var attachments = document.getElementById('attachments');
    var numberOfLines = attachments.children.length;
    var fileNo = numberOfLines / 2; 

    var input = document.createElement('input');
    input.type = "file";
    input.name = "file" + fileNo;
    input.onchange = function () { listOfAttachments(); }; 

    attachments.appendChild(input);
    attachments.appendChild(document.createElement("br"));

}