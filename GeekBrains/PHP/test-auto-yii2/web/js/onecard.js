'use strict';

const contSmallImg = document.querySelector('.container-small-images');
const bigImg = document.querySelector('.big-image');
contSmallImg.addEventListener('click', (event) => {
    document.querySelector('.selected-image').classList.remove('selected-image');
    bigImg.src = `img/middle/720-${event.target.dataset.name}`;
    event.target.classList.add('selected-image');
});