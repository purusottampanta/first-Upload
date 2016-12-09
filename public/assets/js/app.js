
function e_url(path) {
   return url + '/' + path;
}


(function(){
$('.error-div').click(function(){
   $(this).hide();
});

   $('.success-div').click(function(){
      $(this).hide();
   });
})();

(function(){
   $('#search_icon').click(function(){
      $('.search_form').toggle();

   });
   $('.search_form span').click(function(){
      $('.search_form').hide();
   });

   $('input[name=searchOption]').click(function(){
      var type = $(this).val();
      if(type == 'date'){
//              alert(type);
         $('input[name=date]').show();
         $('input[name=text]').hide();
         $('input[name=text]').val('');
         $('#searchSubmit').show();
      }else{
         $('input[name=date]').hide();
         $('input[name=text]').show();
         $('#searchSubmit').show();
         $('input[name=date]').val('');
      }
   });
})();
