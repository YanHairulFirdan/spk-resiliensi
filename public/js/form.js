var flag = [];
document.getElementById("form-group-1").style.display = "block";
function init() {
    var length = Array.from(document.getElementsByClassName('form-group')).length;
    for (var i = 0; i < length; i++) {
        flag[i] = false;
    }

}

init();

function showForm(event) {
    var element = event.target;
    //get all input-form class
    var previousActiveButtons = document.querySelectorAll('.btn-active');
    previousActiveButtons.forEach(button => {
        button.classList.remove('btn-active')
    })
    element.classList.add('btn-active')
    var inputElement = Array.from(document.getElementsByClassName("input-group"));
    //hide all input-form class
    inputElement.forEach(input => {
        input.style.display = 'none';
    })
    //get specific form-group
    var showform = document.getElementById("form-group-" + element.innerText)
    //show that form-group
    showform.style.display = 'block'
}



//onchange function 
function flagChange(event) {
    //listen for event change occurs
    var element = event.target;
    let uncheck = 0;
    //get the id of event's parent
    var parentId = element.parentElement.id;
    //get the last index of the id e.x 1
    var indexOfId = parentId[parentId.length - 1];
    //  console.log(indexOfId)
    //get all of input element from the current form input group
    var checkboxes = Array.from(document.querySelectorAll("#" + parentId + " input"));

    //check if the there  or some input were checked set flag i to true
    if (!element.checked) {
        // console.log("checked false");
        checkboxes.forEach(checkbox => console.log(checkbox.checked))
        check = checkboxes.forEach(checkbox => {
            if (!checkbox.checked) {
                uncheck++;
                //console.log("amount of uncheck form= "+uncheck)
            }
        })
        if (uncheck != 4) {
            // console.log("all input has checked")
            flag[indexOfId - 1] = true;
        }
        else {
            flag[indexOfId - 1] = false;
        }
    }
    else if (element.checked) {
        if (uncheck > 0) uncheck--;
        else if (uncheck == 0) flag[indexOfId - 1] = true;
    }

    //else if none of them were checked set flag i to false


    var flagCheck = 0;

    //if all of flag is true set button of submit to enable
    var btn = document.getElementById('button');

    flag.forEach(singleFlag => {
        if (singleFlag) flagCheck++;
        else if (!singleFlag) {
            if (flagCheck > 0) flagCheck--;
        }
    });

    if (flagCheck == 4) btn.style.display = "block";
    else btn.style.display = "none";

}