/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



var car = {};



const articles = document.getElementById('articles');

if(articles){
    articles.addEventListener('click', (e) => {
        if(e.target.className == 'btn btn-danger delete-article'){
            
            if(confirm('Are you sure?')){
                
                const id = e.target.getAttribute("data-id");
                
                fetch('/article/delete/${id}', {
                    method: 'DELETE'
                }).then(res => window.location.reload());
            }
        }
    });
}

setTimeout(function(){
 $("#flash").fadeOut();
}, 2000);


$(document).ready(function(){
  
   showMore();
   
   $('.navbar-nav li a').click(function(){
       $('li a').removeClass("active");
       $(this).addClass("active");
   });
   
   $.get("/budget/", function(data){
//       console.log("Amount: " + data.incomeStreams[0].amount);
//       console.log("Frequency: " + data.incomeStreams[0].frequency);
//       console.log("Key: " + data.incomeStreams[0].key);
//       console.log("Name: " + data.incomeStreams[0].name);
//       
//       console.log("=============================");
//       
//       
//       console.log("Amount: " + data.incomeStreams[1].amount);
//       console.log("Frequency: " + data.incomeStreams[1].frequency);
//       console.log("Key: " + data.incomeStreams[1].key);
//       console.log("Name: " + data.incomeStreams[1].name);
       console.log("============= Income ==============");
       for(var i=0; i < data.incomeStreams.length; i++){
          console.log("Amount: " + data.incomeStreams[i].amount);
          console.log("Frequency: " + data.incomeStreams[i].frequency);
          console.log("Key: " + data.incomeStreams[i].key);
          console.log("Name: " + data.incomeStreams[i].name);
          
          console.log("=============================");
           
       }
       
       $(".result").html(data.incomeStreams);
   });
   
   //var myRequest = new Request("/budget/");
   var fcStart = "<div>";
   var fcEnd = "</div>";
   
   var res = document.getElementById('result');
   var key, name, amount = "<p>";
   var closingP = "</p>";
   
   
    fetch("/budget/", {
        method: 'GET'
    }).then(function(res){
        return res.json();
    }).then(function(data){
        console.log(data.expenses);
        console.log("=========== Expenses =============");
        for(var i=0; i < data.expenses.length; i++){
            
          console.log("Key: " + data.expenses[i].key);
          console.log("Name: " + data.expenses[i].name);
          console.log("Amount: " + data.expenses[i].amount);
          console.log("=============================");
          
          fcStart += "<h2>Name: " + data.expenses[i].name + "</h2>" +
                              "<p>Key: " + data.expenses[i].key + "</p>" +
                              "<p> Amount: " + data.expenses[i].amount + "</p></div>";
                      
                      console.log(fcStart);
                      
                      
          res.innerHTML = fcStart;
        }
    });
});

function showMore(){
    
    var showCars = 100;
    
    var ellipsesText = "...";
    var moreText = "Show More >";
    var lessText = "Show Less";
    
    $('.more').each(function(){
        
        var content = $(this).html();
        
        if(content.length > showCars){
            
            var c = content.substr(0, showCars);
            var h = content.substr(showCars, content.length - showCars);
            
            var html = c + '<span class="moreellipses">' +
                    ellipsesText + '&nbsp;</span><span class="morecontent"><span>' +
                    h + '</span>&nbsp;&nbsp;<a href="" class="morelink">' + moreText +
                    '</a></span>';
            
            $(this).html(html);
        }
    });
    
    $('.morelink').click(function(){
        
        var moreLink = $(this);
        
        if(moreLink.hasClass("less")){
            moreLink.removeClass("less");
            moreLink.html(moreText);
        }else{
            moreLink.addClass("less");
            moreLink.html(lessText);
        }
        
        moreLink.parent().prev().toggle();
        moreLink.prev().toggle();
        
        return false;
    });
}