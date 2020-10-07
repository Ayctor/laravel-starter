let keydownValue = {};
let inputValue = {};

const inputs = document.querySelectorAll('form input[pattern]');

for (const input of inputs) {
    input.addEventListener('keydown', keydownHandler);
    input.addEventListener('input', inputHandler);
}

function keydownHandler(event) {
    keydownValue[event.target.id] = event.target.value;
}

function inputHandler(event) {
    const pattern = this.getAttribute('pattern');
    const regex = new RegExp(pattern);

    inputValue[event.target.id] = this.value;

    if (inputValue[event.target.id] === '' || regex.test(inputValue[event.target.id])) {
        return this.value = inputValue[event.target.id];
    }

    return this.value = keydownValue[event.target.id];
}
