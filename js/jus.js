$(document).ready(function(){
    $('#name').click(function(){
        $('#nav-systeme').toggle()
    });

    $('.logo').click(function(){
        $('.aside').toggle()
    })
})



function Annule(){
    let input = document.getElementsByTagName("input")
    input.innerHTML = " "  
}
 


