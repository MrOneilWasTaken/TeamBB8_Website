//variables
const newForm = document.getElementById('newShowForm');
const endDate = document.getElementById('endDate');
const box = document.getElementById('endDateCont');

function autoHeight() {
    this.style.height = "";this.style.height = this.scrollHeight + "px"
}

newForm.checkboxAiring.onclick = function() {
    if(newForm.checkboxAiring.checked) {
        endDate.required = false;
        box.style.visibility = 'hidden'; 
    } else {
        endDate.required = true;
        box.style.visibility = 'visible'; 
    }
}