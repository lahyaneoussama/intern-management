document.addEventListener('DOMContentLoaded', function() {
    const dayBtn = document.querySelectorAll('.day-button');
    const taskCount = document.getElementById('nbr-coun');
    let currentDay = 'mer';

    dayBtn.forEach(button => {
        button.addEventListener('click', function() {
            currentDay = button.getAttribute('data-day');
            updateActiveDay();
        });
    });

    function updateActiveDay() {
        dayBtn.forEach(button => {
            button.classList.toggle('active', button.getAttribute('data-day') === currentDay);
        });


        taskCount.textContent = `(0)`;
    }


    updateActiveDay();
});



let images = [
    '../img/icons-nav/Licenece pro.png',
    '../img/logo.png',
    '../img/lic.jpg'
];
let img = document.getElementById('slideimg');
let index = 0;

function changeImage() {
    img.src = images[index];
    index = (index + 1) % images.length;
}

setInterval(changeImage, 5000);




 // Function to toggle the visibility of the table
 function toggleTable() {
    const tableContainer = document.getElementById('table-container');
    if (tableContainer.style.display === 'none' || tableContainer.style.display === '') {
        tableContainer.style.display = 'block';
    } else {
        tableContainer.style.display = 'none';
    }
}