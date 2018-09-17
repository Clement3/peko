var $ = require('jquery');
require('bootstrap');

$(".cmd_modal").click(function(){
    var title = $(this).find(".card-header").text();
    var body = $(this).find(".table-responsive").html();
    $("#exampleModalCenter").find(".modal-title").text(title);
    $("#exampleModalCenter").find(".modal-body").html(body);
    $("#exampleModalCenter").modal('toggle');
});

$(".sidebar-toggler").click(function (e) { 
    e.preventDefault();
    $("#sidebar").toggleClass("active");
});