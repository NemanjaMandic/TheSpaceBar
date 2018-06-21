$(document).ready(function(){
    
  alert("ALERT");
    
    $('.js-like-article').on('click', function(e){
        
        e.preventDefault();
        
        var $link = $(e.currentTarget);
        
        $link.toggleClass('fa-heart-o').toggleClass('fa-heart');
        
        $.ajax({
            method: "POST",
            url: $link.attr('href')
        }).done(function(data){
            $('.js-article-count').html(data.hearts);
        });
        
        
    });
    
    
    var submitIcon = $('.searchbox-icon');
    var inputBox = $('.searchbox-input');
    var searchBox = $('.searchbox');
    var isOpen = false;
    
    submitIcon.click(function(){
        
        if(isOpen == false){
           searchBox.addClass('searchbox-open');
           inputBox.focus();
           isOpen = true;
        }else{
            searchBox.removeClass('searchbox-open');
            inputBox.focusout();
            isOpen = false;
        }
        
    });
    
    submitIcon.mouseup(function(){
        return false;
    });
    
    searchBox.mouseup(function(){
        return false;
    });
    
    $(document).mouseup(function(){
        if(isOpen == true){
            submitIcon.css('display', 'block');
            submitIcon.click();
        }
    });
    
    inputBox.keyup(function(){
        var inputVal = $(this).val();
        inputVal = $.trim(inputVal).length;
        
        if(inputVal !== 0){
            submitIcon.css("background", "red");
        }else{
            inputBox.val('');
            submitIcon.css('display', 'block');
        }
    });
    
    
    alert("ALERT");
});


 var car = {
     make: "volvo",
     speed: 160,
     engine: {
         size: 2.0,
         make: "bmw",
         fuel: "petrol",
         pistons: [ { maker: "BEMVE" }, { maker: "BMW" } ]
     },
     
     drive: function(ime){
         return "DRAAAAJJVV " + ime;
     }
 };
 
 var niz = [
     "string",
     100,
     [ "embed", 200 ],
     { car: "Ford" }
 ];