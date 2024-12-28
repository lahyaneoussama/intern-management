let nav = document.getElementById('img-logo');
let navbar = document.getElementById('navbar');
let notifictaion = document.getElementById('notifictaion');

nav.addEventListener('click', function() {
    navbar.classList.toggle('active');

});

 function toggleTable() {
    const tableContainer = document.getElementById('table-container');
    if (tableContainer.style.display === 'none' || tableContainer.style.display === '') {
        tableContainer.style.display = 'block';
    } else {
        tableContainer.style.display = 'none';
    }
}