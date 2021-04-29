/*
************************************************************* */
// my js

$('.confirm').click(function(){
    return confirm('are you sure ?');
})

$('.live').keyup(function(){
    $("."+$(this).data('class')).text($(this).val());
})

//from stack-overflow
var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
        URL.revokeObjectURL(output.src) // free memory
    }
};

// fade links on artical
$(".card").hover(function(){
    $(this).next('form').find('div.links').fadeToggle();
});


$('.role').click(function(){
    var roles = {'1':'admin have all rights to add and delete and edit [users,catigories,articals]',
                '2':'moderator have all rights to add  and edit [users,catigories,articals]',
                '3':'supervisor have all rights to see and check on [users,catigories,articals]',
                '4': 'manger have all rights to add and delete and edit [users]'};
    var roleV = $(this).val();
    $('.roleDesc').html(roles[roleV]);
})


// ===================================================================

$(function() {
    "use strict";

    // ============================================================== 
    // sales ratio
    // ============================================================== 
    var chart = new Chartist.Line('.sales', {
        labels: [1, 2, 3, 4, 5, 6, 7],
        series: [
            [24.5, 28.3, 42.7, 32, 34.9, 48.6, 40],
            [8.9, 5.8, 21.9, 5.8, 16.5, 6.5, 14.5]
        ]
    }, {
        low: 0,
        high: 48,
        showArea: true,
        fullWidth: true,
        plugins: [
            Chartist.plugins.tooltip()
        ],
        axisY: {
            onlyInteger: true,
            scaleMinSpace: 40,
            offset: 20,
            labelInterpolationFnc: function(value) {
                return (value / 10) + 'k';
            }
        },

    });

    var chart = [chart];

    // ============================================================== 
    // Our Visitor
    // ============================================================== 
    var sparklineLogin = function() {
        $('#earnings').sparkline([6, 10, 9, 11, 9, 10, 12, 10, 9, 11, 9, 10, 12, 10, 9, 11, 9], {
            type: 'bar',
            height: '40',
            barWidth: '4',
            width: '100%',
            resize: true,
            barSpacing: '8',
            barColor: '#137eff'
        });
    };
    var sparkResize;

    $(window).resize(function(e) {
        clearTimeout(sparkResize);
        sparkResize = setTimeout(sparklineLogin, 500);
    });
    sparklineLogin();
});