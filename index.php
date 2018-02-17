<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>calc </title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
      <div class="container">
        
        <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-12 col-xs-offset-0" style="background-color: #f2f2f2; margin-top: 15px; padding: 17px;">
          <div class="well col-xs-12" id="result" style="min-height: 85px; background-color: #ffffff;">
            <span style="font-size: 16px; font-weight: bold;"></span>
          </div>
          <div class="col-xs-9">
            <div class="col-xs-4" style="margin-bottom: 15px;">
                  <button type="button" class="btn btn-default btn-block num" data-num="("> ( </button>
            </div>
            <div class="col-xs-4" style="margin-bottom: 15px;">
                  <button type="button" class="btn btn-default btn-block num" data-num=")"> ) </button>
            </div>
          </div>
          <div class="col-xs-3">
                  <button type="button" class="btn btn-danger btn-block clr"> C </button>
          </div>
          <div class="col-xs-9">
          <?php for($i=1; $i<=9; $i++)
          {?>
            
            <div class="col-xs-4" style="margin-bottom: 15px;">
                  <button type="button" class="btn btn-default btn-block num" data-num="<?php echo $i; ?>"> <?php echo $i; ?> </button>
            </div>

          <?php } 
          ?>
            <div class="col-xs-4" style="margin-bottom: 15px;">
                  <button type="button" class="btn btn-default btn-block num" data-num="0"> 0 </button>
            </div>
            <div class="col-xs-4" style="margin-bottom: 15px;">
                  <button type="button" class="btn btn-default btn-block num" data-num="."> . </button>
            </div>
            <div class="col-xs-4" style="margin-bottom: 15px;">
                  <button type="button" class="btn btn-info btn-block eq"> = </button>
            </div>
          </div>
          <div class="col-xs-3">
            <button type="button" class="btn btn-success btn-block opper" data-op="+"> + </button>
            <button type="button" class="btn btn-success btn-block opper" data-op="-"> - </button>
            <button type="button" class="btn btn-success btn-block opper" data-op="/"> / </button>
            <button type="button" class="btn btn-success btn-block opper" data-op="x"> x </button>
          </div>
        </div>
        
        
        

      </div>
      <div class="container">
      <div class="panel-footer col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-12 col-xs-offset-0">
          &copy; EZ NET 
      </div>
      </div>
      


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

    <script>
      $(function() {

        $(".num, .opper").click(function() {
          var value = $(this).data($(this).hasClass('num') ? 'num' : 'op');
          var span = $('#result span');
          if (span.text().length < 55 )
          {
            if(span.html().indexOf('Erreur') == -1)
            {
              span.append(value);
            }
            else
            {
              span.html('').append(value);
            }
          }
                                          });

        $(".clr").click(function() {
          $('#result span').html('');
                                          });

        $(".eq").click(function() {
          var expre = $('#result span').text();
          if(expre.length > 2 && expre.indexOf('Erreur') == -1) 
          {
            console.log( expre );
            $.ajax({
              url: 'calc.php', //This is the current doc
              type: "POST",
              data: { expre : expre },
              success: function(data){
              $('#result span').hide().html(data).fadeIn('slow');
                                      }
                });
          }


                                            });



      });
    </script>
  </body>
</html>