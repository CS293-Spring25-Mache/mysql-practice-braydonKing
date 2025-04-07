console.log("Hello from script.js");

$(document).ready(function(){

    $(".hood").click(function(){
      

      var id=$(this).attr("id");
      //console.log(id);

      $.ajax({
        method: "GET",
        url: "src/ajax.php",
        data: { neighborhoodId: id }
      })
        .done(function( data ) {
          console.log("Data Loaded: " + data);
      
          json= JSON.parse(data);
          console.log(json);

          var name=json[0].name;
          var pictureUrl=json[0].pictureUrl;

          var html="<p>"+name+"</p><img src='"+pictureUrl+"'>";

          $("#result").html(html);

          //console.log(name);

      });


    });


  });