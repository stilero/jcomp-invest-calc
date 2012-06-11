jQuery(function($){
    
//    var deviceAgent = navigator.userAgent.toLowerCase();
//    var agentID = deviceAgent.match(/(iphone|ipod|ipad|android|symbian)/);
//    if (agentID) {
//        window.location = 'index.php?option=com_investmentcalculator&view=mobile&format=raw';
//    }
    
    $('#help-button').button({
        icons: {
            primary: "ui-icon-help"
        }
    });
    
    $( "#dialog" ).dialog(
        {
            autoOpen: false,
            width: 450
        }
    );
    
    $('#help-button').click(function(){
        var requestData = {
            option: 'com_investmentcalculator',
            format: 'raw',
            view: 'help'
        };
        $.get('index.php', requestData, function(data) {
            $('#dialog').html(data);
        });
        
        $( "#dialog" ).dialog('open');

        
        return false;
    });
    
    
    $('#economic-life').change(function(){
        var years = $('#economic-life').val()<30 ? $('#economic-life').val() : 30;
        $('div.payback').html('');
        for(var i=1;i<=years;i++){
            $('<h3>Payment Balance Year ' + i + '</h3>').appendTo('div.payback');
            $('<label for="revenue-year-'+ i +'">Revenue Year '+i+':</label>').appendTo('div.payback');
            $('<input id="revenue-year-'+ i +'" name="revenue-year-'+ i +'" title="Revenue Year '+ i +'" />').appendTo('div.payback');
            $('<label for="costs-year-'+ i +'">Costs Year '+i+':</label>').appendTo('div.payback');
            $('<input id="costs-year-'+ i +'" name="costs-year-'+ i +'" title="Costs Year '+ i +'" />').appendTo('div.payback');
            if(i==1){
                //$('<input type="button" value="Repeat for following years" id="repeat-btn" class="ui-button ui-button-text-only ui-widget ui-state-default ui-corner-all" />').appendTo('div.payback');
                $('<button id="repeat-button">Repeat</button>').appendTo('div.payback');
                $('#repeat-button').button({
                    icons: {
                        primary: "ui-icon-arrowrefresh-1-e"
                    }
                });
                $('#repeat-button').click(function(){
                    var revenue = $('#revenue-year-1').val();
                    var cost = $('#costs-year-1').val();
                    $('input[name^="revenue-"]').val(revenue);
                    $('input[name^="costs-"]').val(cost);
                });
                //$('<span class="ui-button-text">Repeat</span>').appendTo('div.payback');
                //$('</button>').appendTo('div.payback');
            }
        }
    });
    
    var enableNextBtn = function(){
        $( "#calc-button" ).button( "option", "disabled", true );
        if($('#interest-rate').val() && $('#economic-life').val() && $('#investment').val()){
            $( "#calc-button" ).button( "option", "disabled", false );
        }
    }
    
    $('.settings input').change(enableNextBtn);
    
    $('#calc-button').button({
        icons: {
            primary: "ui-icon-calculator"
        }
    });
    
    $('#calc-button').click(function(){
        var investment = $('#investment').val();
        var years = $('#economic-life').val() < 25 ? $('#economic-life').val() : 25;
        var rate = $('#interest-rate').val();
        var residualVal = $('#residual-value').val();
        var balances = [];
        for(var i=1;i<=years;i++){
            balance = $('#revenue-year-'+i).val() - $('#costs-year-'+i).val();
            delimiter = (i<years) ? ',' : '';
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
            view: 'calculator'
        };
        $.get('index.php', requestData, function(data) {
            $('#results').html(data);
            $('.jtable caption').addClass('ui-state-default');
            $(".jtable th").each(function(){
                $(this).addClass("ui-state-default");
            });
            $(".jtable td").each(function(){
                $(this).addClass("ui-widget-content");
            });
        });
        return false;
    });
    
    $('#calc-button').hover(
        function(){
            $(this).addClass("ui-state-hover");
        },
        function(){
            $(this).removeClass("ui-state-hover");
        }
    );
    
});
