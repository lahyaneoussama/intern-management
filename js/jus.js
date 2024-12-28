$(document).ready(function () {
    // Toggle navigation system
    $('#name').click(() => $('#nav-systeme').toggle());
    
    // Toggle sidebar
    $('.logo').click(() => $('.aside').toggle());
    
    // Toggle control tables
    $('.btn-control button').click(function () {
        let target = $(this).hasClass('btn-controle') ? '.controle' : '.moyenne';
        $(target).fadeToggle(300); // Smooth transition
    });
});




function Annule(){
    let input = document.getElementsByTagName("input")
    input.innerHTML = " "  
}
 


