//variables
const form = document.getElementById('showForm');
const endDate = document.getElementById('endDate');
const box = document.getElementById('endDateCont');

function autoHeight() {
    this.style.height = "";this.style.height = this.scrollHeight + "px"
}

form.checkboxAiring.onclick = function() {
    if(form.checkboxAiring.checked) {
        endDate.required = false;
        box.style.visibility = 'hidden'; 
    } else {
        endDate.required = true;
        box.style.visibility = 'visible'; 
    }
}