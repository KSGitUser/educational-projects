'use strict';

console.log('try js');
const brandSelect = document.querySelector('.brand-select-form');
brandSelect.addEventListener('change', (event)=> {
    const brandId = event.target.value;
    if (!Number.isInteger(+brandId)) {
        console.log('Выбран не верный пункт');
        return
    }
    const select = document.querySelector('.model-select-form');
    if (brandId !== '') {
        fetch(`/index.php?r=auto/find-models-names&brand_id=${brandId}`)
            .then(function (response) {
               response.json().then(
                    (data) => {
                                            select.options.length = 0;
                        for (let key in data) {
                            console.log(data[key]);
                            select.options[select.options.length] = new Option(data[key], key);
                        }
                    }
                )
            })
            .catch((e) => {
                console.log(e.message)
            });
    } else {
        select.options.length = 0;
        select.options[select.options.length] = new Option('Вначале выберете марку автомобиля','0');
    }
});










