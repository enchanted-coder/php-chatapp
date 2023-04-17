const socket = new WebSocket('ws://localhost:8080');

socket.addEventListener('open', event => {
  console.log('Connected to WebSocket server');
});

socket.addEventListener('message', event => {
  console.log(`Received message: ${event.data}`);
  const listElement = document.getElementById('messages');
  listElement.innerHTML = event.data
  
  
});

socket.addEventListener('close', event => {
  console.log('Disconnected from WebSocket server');
});

const form = document.querySelector('form');
const input = document.querySelector('input');
const messages = document.querySelector('#messages');

form.addEventListener('submit', event => {
  event.preventDefault();

  const message = input.value.trim();

  if (message) {
    socket.send(message);

    const li = document.createElement('li');
    li.textContent = message;
    messages.appendChild(li);

    input.value = '';
    input.focus();
  }
});



