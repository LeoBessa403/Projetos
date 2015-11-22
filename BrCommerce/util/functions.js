// JavaScript Document
$(function(){		  
	$("#menu2 ul li").mouseover(function(){
				$(this).addClass('selecionado');													 
	})
	$("#menu1 ul li").mouseover(function(){
				$("#menu2 ul li").removeClass('selecionado');													 
	})
	
 });

 