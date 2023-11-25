"use strict;"

if (!window.WebSocket) {
  alert('Ваш браузер не поддерживает Веб-сокеты');
}
const webSocket = new WebSocket('ws://chat.ws:8080');

document.getElementById('chat_form')
  .addEventListener('submit', function (event) {
    const textMessage = this.message.value;
    webSocket.send(textMessage);
    event.preventDefault();
    return false;
  });


webSocket.onmessage = function (event) {
  const data = event.data;
  const messageContainer = document.createElement('div');
  const textNode = document.createTextNode(data);
  messageContainer.appendChild(textNode);
  document.querySelector('.chat')
    .appendChild(messageContainer);
}

