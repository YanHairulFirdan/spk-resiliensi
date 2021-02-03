window.onload = function (event) {
    var elementGroups = Array.from(document.getElementsByClassName('input-group'));
    console.log(typeof (elementGroups));
    elementGroups.forEach(element => {
        element.style.display = 'none'
    });
}
// document.getElementById('form-group-1').style.display = 'block';

const previousButton = document.getElementById('previous');
const btnNext = document.getElementById('next');
const submit = document.getElementById('submit');
// previousButton.style.display = 'none';
submit.style.display = 'none';



var counter = 1;

function nextForm() {
    counter++;
    toggleDisplayButton(counter);
    showForm(counter);
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
    console.log('next');
    console.log(typeof (counter));
    console.log('form ke-' + counter);
}

function previousForm() {
    counter--;
    toggleDisplayButton(counter);
    console.log(typeof (counter));
    showForm(counter);
    console.log('form ke-' + counter);
    console.log('previous');
}

function toggleDisplayButton(counter) {
    if (counter > 1) {
        previousButton.innerText = 'sebelumnya';
        if (counter > 6) {
            console.log(counter);
            btnNext.style.display = 'none';
            submit.style.display = 'inline';
        } else {
            btnNext.style.display = 'inline';
            submit.style.display = 'none';
        }
    } else {
        previousButton.innerHTML = '<a href = "/motivation">sebelumnya</a>';
    }
}

function showForm(counter) {
    var inputElement = Array.from(document.getElementsByClassName("input-group"));
    inputElement.forEach(input => {
        input.style.display = 'none';
    })
    var showform = document.getElementById("form-group-" + counter)
    showform.style.display = 'block'
}