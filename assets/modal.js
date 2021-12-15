const $ = require('jquery');
global.$ = global.jQuery = $;


$(document).ready(function (){
    console.log('assets');
    $('#salary-modal').on('show.bs.modal', function (){
        $('#salary_sum').trigger('focus')
    });
});

// document.addEventListener('DOMContentLoaded', (e)=>{
//     e.preventDefault();
//     const addSalaries = document.querySelectorAll('.salary-add-btn');
//     const salaryModal = document.querySelector('#salaryCreateForm');
//
//     addSalaries.forEach((salary)=>{
//         salary.addEventListener('click',(e)=>{
//             let contract_id = salary.getAttribute('data-contract_id');
//             salaryModal.setAttribute('action', `/salary/create/montage/${contract_id}`)
//         })
//     })
//
// });