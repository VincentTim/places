/**
 * Structure par défaut de tout nouveau module
 */

module.exports = function(context){

	"use strict";
    
    var datepicker = require('jquery-ui/datepicker');
	var fancybox = require('fancybox');

    function initDatePicker() {
		$.datepicker.regional['fr'] = {
			closeText: 'Fermer',
			prevText: '&#x3c;Préc',
			nextText: 'Suiv&#x3e;',
			currentText: 'Courant',
			monthNames: ['Janvier','Février','Mars','Avril','Mai','Juin','Juillet','Août','Septembre','Octobre','Novembre','Décembre'],
			monthNamesShort: ['Jan','Fév','Mar','Avr','Mai','Jun','Jul','Aoû','Sep','Oct','Nov','Déc'],
			dayNames: ['Dimanche','Lundi','Mardi','Mercredi','Jeudi','Vendredi','Samedi'],
			dayNamesShort: ['Dim','Lun','Mar','Mer','Jeu','Ven','Sam'],
			dayNamesMin: ['D','L','M','M','J','V','S'],
			weekHeader: 'Sm',
			dateFormat: 'dd/mm/yy',
			firstDay: 1,
			isRTL: false,
			showMonthAfterYear: false,
			yearSuffix: ''
		};
		$('.form__datepicker').datepicker($.datepicker.regional[ "fr" ]);
	}
    
    function deleteImageContrib(){
        $(".delete-image").click(function(e){
            e.preventDefault();
            if(confirm('Etes-vous sûr de vouloir supprimer cette image?')){
                $(this).parent().fadeOut();
                $(this).parents('.form-files').append('<input name="appbundle_files_delete[]" type="hidden" value="'+$(this).data('id')+'" />');
            }
        })
    }
	
	function initFancyBox(){
			$('.fancybox').fancybox();
	}
	

	function init(){
         
        initDatePicker();
        deleteImageContrib();
		initFancyBox();
        
	}

	return {
		ready : init
	}

};