/**
 * Structure par défaut de tout nouveau module
 */

module.exports = function(context){

	"use strict";

	function openSidebar(){

			$('.sidebar__control').click(function(){
				$('.sidebar').toggleClass('sidebar__open');
			})

	}
	

	function init(){
		openSidebar();
	}

	return {
		ready : init
	}

};