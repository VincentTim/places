/**
 * Structure par défaut de tout nouveau module
 */

module.exports = function(context){

	"use strict";

    function dashboardNav(){
        $('.dropdown-btn').click(function(){
            $(this).next('.drop-menu').slideDown();
            $(this).toggleClass('open');
            if($(this).hasClass('open')){
                $(this).next('.drop-menu').slideUp();    
            }
        })
    }
	

	function init(){
        dashboardNav();
	}

	return {
		ready : init
	}

};