const $ = require('jquery');
global.$ = global.jQuery = $;

$(document).ready(function (){
    console.log('assets');
    $('#salary-modal').on('show.bs.modal', function (){
        $('#salary_sum').trigger('focus')
    });
});