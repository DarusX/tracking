
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */


import './bootstrap'

/**
window.Vue = require('vue');

 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 
 Vue.component('example-component', require('./components/ExampleComponent.vue'));
 
 const app = new Vue({
     el: '#app'
    });
    
*/

jQuery.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $("meta[name='csrf-token']").attr("content")
    }
});

jQuery(".logout").click((event) => {
    event.preventDefault()
    $.ajax({
        url: "/logout",
        method: "POST",
        success: (data) => {
            location.reload()
        },
        
    })
})

jQuery(".destroy").click(function(event){
    event.preventDefault()
    swal({
        text: "¿Estás seguro?",
        icon: "warning",
        buttons: true,
        dangerMode: true
    }).then((confirm) => {
        if(confirm){
            $.ajax({
                url: $(this).attr("href"),
                method: "DELETE",
                //data: {_method: "DELETE"},
                success: (data) => {
                    location.reload()
                }
            }).fail(function(jqXHR, textStatus, errorThrown ){
                let response = JSON.parse(jqXHR.responseText)
                swal({
                    title: errorThrown,
                    text: response.message,
                    icon: "error"
                })
            })
        }
    })
})