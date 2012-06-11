/**
 * @version     $Id$
 * @copyright   Copyright 2012 Stilero AB. All rights re-served.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
$(document).bind('pageinit', function(){
    $('#years').change(function(){
        var years = $('#years').val()<30 ? $('#years').val() : 30;
        //var container = '#payback';
        $('#payback').html('');
        for(var i=1;i<=years;i++){
            $('<label for="payment-balance-year-'+ i +'" class="ui-input-text">Payment Balance Year '+ i +':</label>').appendTo('#payback');
            $('<input type="number" name="payment-balance-year-'+ i +'" id="payment-balance-year-'+ i +'" data-mini="false" class="ui-input-text ui-body-c ui-corner-all ui-shadow-inset" />').appendTo('#payback');
            if(i==1){
                $('<a href="#" id="repeat-button" data-role="button" data-inline="true" data-icon="refresh">Repeat</a>').appendTo('#payback');
                $('#repeat-button').bind("click",function(){
                    var balance = $('#payment-balance-year-1').val();
                    $('input[name^="payment-balance-year-"]').val(balance);
                });
            }//End if
        }//End for
    });//End #years change event
    
    var enableNextBtn = function(){
        $('#balance-btn').removeClass('ui-disabled');
        if(!$('#rate').val() || !$('#years').val() || !$('#investment').val()){
            $('#balance-btn').addClass('ui-disabled');
        }
    }
    
    $('#settings input').change(enableNextBtn);
        
    $('#calc-btn').bind("click", function(){
        var investment = $('#investment').val();
        var years = $('#years').val() < 25 ? $('#years').val() : 25;
        var rate = $('#rate').val();
        var residualVal = $('#residual-value').val();
        var balances = [];
        for(var i=1;i<=years;i++){
            balance = !$('#payment-balance-year-'+i).val() ? 0 : $('#payment-balance-year-'+i).val();;
            //delimiter = (i<years) ? ',' : '';
            balances.push(balance);
        }
        var requestData = {
            investment: investment,
            years: years,
            rate: rate,
            resValue: residualVal,
            balances: balances,
            option: 'com_investmentcalculator',
            format: 'raw',
            view: 'calculatormobile'
        };
        $.get('index.php', requestData, function(data) {
            $('#result').html(data);
            $.mobile.changePage('#results');
            $('#result').listview('refresh');
            //$('.jtable caption').addClass('ui-state-default');
//            $(".jtable th").each(function(){
//                $(this).addClass("ui-state-default");
//            });
//            $(".jtable td").each(function(){
//                $(this).addClass("ui-widget-content");
//            });
        });
        return false;
    });
});