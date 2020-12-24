$(function () {

   $('a.nav-link').each(function () {
       //alert('kttttkrk');
       let location = window.location.protocol + '//'+ window.location.host + window.location.pathname;
       let link = this.href;
       if (link == location) {
           $('a.nav-link').removeClass('active');
           $(this).addClass('active');
           let parLi = $(this).closest('li.has-treeview').children('a');
           parLi.addClass('active');
           //console.log(parLi);
       }
   });
});