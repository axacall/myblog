    $(function () {
        // setTimeout(function(){ $(".success").hide(); }, 3000);
        $("button").click(function(){
          setTimeout(function(){ $(".mesajlar").show(); }, 10);
          $(".msj").html("işlem başarılı");
          $(".msj").val(".success");
          setTimeout(function(){ $(".mesajlar").hide(); }, 10000);
        })
  });