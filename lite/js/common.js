/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/*** Initialize Scripts ***/

// Dropdown Menu
$(".dropdown-trigger").dropdown();

// Tooltips
$(document).ready(function(){
    $('.tooltipped').tooltip();
});  

// Select
$(document).ready(function(){
    $('select').formSelect();
});

// Material Boxed
$(document).ready(function(){
    $('.materialboxed').materialbox();
});

// Collapsible
$(document).ready(function(){
    $('.collapsible').collapsible();
});

// HTML Importer script
$(function(){
    var includes = $('[data-include]');
    jQuery.each(includes, function(){
        var file = 'views/' + $(this).data('include') + '.html';
        $(this).load(file);
    });
});
