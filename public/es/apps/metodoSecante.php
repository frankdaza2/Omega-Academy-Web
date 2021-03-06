<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Este curso en línea propuesto por 5 estudiantes de ingeniería multimedia e ingeniería de sistemas de la universidad de San Buenaventura Cali, nace de la necesidad de implementar y compartir los conocimientos obtenidos hasta el momento para ofrecer una guía de trabajo para las generaciones futuras, que les permita aprender de forma dinámica y que a la vez sea una plataforma de apoyo para el docente.">
    <meta name="author" content="Omega Academy Group.">
    <link rel="icon" href="../../img/icon.png">

    <title>Método de la Secante | Omega Academy</title>

    <!-- Bootstrap core CSS -->
    <link href="../../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../../css/navbar.css" rel="stylesheet">
    
  </head>

  <body>

    <div class="container">

      <img id="banner"  src="../../img/banner.png" class="img-responsive" alt="BANNER OMEGA ACADEMY">      
      <img id="bannerMovil" src="../../img/bannerMovil.png" class="img-responsive" alt="BANNER OMEGA ACADEMY">

      <!-- Static navbar -->
      <div class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>            
          </div>
          <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li><a href="../index.html" style="color: white">Inicio</a></li>
              <li class="active2"><a href="../software.html" style="color: #d40b3a">Software</a></li>
              <li><a href="../videos.html" style="color: white">Vídeos</a></li>
              <li><a href="../documentos.html" style="color: white">Documentos</a></li>                            
              <li><a href="../nosotros.html" style="color: white">Nosotros</a></li>
              <li><a href="https://github.com/frankdaza2/Omega-Academy-Web" target="_blank" style="color: white">Github</a></li>
              <li><a href="../contacto.php" style="color: white">Contacto</a></li>  
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li class="active2"><a href="metodoSecante.php" style="color: #d40b3a">Español</a></li>              
              <li><a href="../../en/apps/secantMethod.php" style="color: white">English</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </div>          
      
      <form class="form-horizontal" method="POST" action="metodoSecante.php" role="form">
        <legend><h2 class="text-center">Método de la Secante</h2></legend>
        <div class="form-group">
          <label class="col-sm-5 control-label" for="funcion">Función f(x) = </label>
          <div class="col-sm-3">
            <input name="funcion" id="funcion" type="text" class="form-control" <?php 
              if (isset($_POST["funcion"])) {
                echo "value=".$_POST["funcion"];
              }
            ?> autofocus required>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-5 control-label" for="x0">Punto x0 = </label>
          <div class="col-sm-3">
            <input name="x0" id="x0" type="text" class="form-control" <?php 
              if (isset($_POST["x0"])) {
                echo "value=".$_POST["x0"];
              }
            ?>>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-5 control-label" for="x1">Punto x1 = </label>
          <div class="col-sm-3">
            <input name="x1" id="x1" type="text" class="form-control" <?php 
              if (isset($_POST["x1"])) {
                echo "value=".$_POST["x1"];
              }
            ?>>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-5 control-label" for="error">Error relativo = </label>
          <div class="col-sm-3">
            <input name="error" id="error" type="text" class="form-control" <?php 
              if (isset($_POST["error"])) {
                echo "value=".$_POST["error"];
              }
            ?>>
          </div>
        </div>
        <div class="text-center">
          <input type="submit" class="btn btn-primary" value="EVALUAR">
          <a href="metodoSecante.php" class="btn btn-danger">BORRAR</a>
        </div>
      </form>

      <br>
      <h3 class="text-center bg-primary">RESULTADO</h3>  

      <table class="table table-bordered table-hover">
        <thead>
          <tr>
            <th class="text-center">Función f(x)</th>            
            <th class="text-center">Punto xn</th>
            <th class="text-center">Error relativo xi</th>
          </tr>
        </thead>
        <tbody>
          <tr  class="text-center">
            <?php
              if (isset($_POST["funcion"])) {
                
                require "../../../models/validadorExpresiones/Evaluar.php";

                $func = $_POST["funcion"];
                $x0 = $_POST["x0"];
                $fx0 = 0;
                $x1 = $_POST["x1"];
                $fx1 = 0;
                $error = $_POST["error"];                 
                $xn = 0;                  


                $sec = new Evaluar();

                function secante($func, $x0, $x1, $error, $errorRel, $sec) {
                  if ($error > $errorRel) {
                    echo "<td>".$func."</td>";
                    echo "<td>".$x1."</td>";
                    echo "<td>".$errorRel."</td>";
                  }
                  else {
                    $fx0 = $sec->expression($func, $x0);
                    $fx1 = $sec->expression($func, $x1);                    
                    $xn = $x1 - (($x1 - $x0) / ($fx1 - $fx0)) * $fx1;
                    $errorRel = abs($xn - $x1) / $xn;
                    secante($func, $x1, $xn, $error, $errorRel, $sec);
                  }
                }

                secante($func, $x0, $x1, $error, $errorRel = 1, $sec);
              }
            ?>            
          </tr>
        </tbody>
      </table>    

      
      <br><br>


        <div class="table-responsive text-center">
          <script type="text/javascript" language="javascript" src="http://www.geogebra.org/web/4.4/web/web.nocache.js"></script>
           <article class="geogebraweb" data-param-width="800" data-param-height="600" data-param-ggbbase64="UEsDBBQACAgIAM1CWUMAAAAAAAAAAAAAAAAWAAAAZ2VvZ2VicmFfamF2YXNjcmlwdC5qc0srzUsuyczPU0hPT/LP88zLLNHQVKiuBQBQSwcI1je9uRkAAAAXAAAAUEsDBBQACAgIAM1CWUMAAAAAAAAAAAAAAAAMAAAAZ2VvZ2VicmEueG1svVZtb9s2EP6c/oqDPicxSVGyHMgp1gIFCmTdgHTDsG+URMtcZFEQKb8M/fE7kpIjpy/o0GFB7CN5D++5O96Rzl8fdw3sZW+UbtcRvSURyLbUlWrrdTTYzU0Wvb5/lddS17LoBWx0vxN2HXGHVNU62iSblBPGbgou0hu+yuKbjONXucrKpCJVma14BHA06q7VH8ROmk6U8rHcyp140KWwnnhrbXe3WBwOh9uJ6lb39aKui9ujqSJAN1uzjsbBHZq72HSIPZwRQhd//PwQzN+o1ljRljICF8Kg7l9d5QfVVvoAB1XZ7TrKCIaxlareYkypmywcqMOEdLK0ai8Nbp1Nfcx210UeJlqnvwojaM7hRFCpvapkv47ILUsi0L2SrR21dGRZTPvzvZKHYMiNPAcmzWrdFMLZgE+fgBFG4NoJGgRDkaZBRcIaiYNgQfAgkoDhYTsPUB4wPGB4HMFeGVU0Eo9UNAZzptpNj+d1nht7aqT3Z1x4jpdeY0xG/Y3g2CUxJBnXCbl2H8zsNZ+yOwuSzlhtP/xL0olymbHvp2Q/FGg8cbIvhcmSr4SZfoM0xP09cdJkxolU/t9/PmOMvxXmS8Yw/zHClP8vIeaLqVXysTvAbB12rB4rd8b1S7yCZOXKnkKCvZEuscoToCsUSwbYDUAT4AlOaQapk0uIl6jgEEMGDkdj8M2RZPjFl95YCgkac6tL7EmgSMQhiYH6nuKAnQS+L7FHWYyIJIEENzl6ypyJOAWe4izOgKOPriWXFIExbsQ50jOIKcRuM10CSyF19ih3rZ5mznU0ySAlkFJnELsaOzp0M+IziF006Zgu1XaDvUhRuaumodXd+SwQjffR8z0X7qeLa/Aqb0QhG3wZHt1JAuxF4zrCE210a2E6RBbW6l50W1WaR2kt7jLwl9iLB2Hl8R2izcTtsaVuza+9tm91M+xaA1Dqhpx91g2djdnZa5zEMwWfK5KZIp2Nl1/k1aiBwUjk172Z4KKq3jvE89WAmfylbU5veimeOq0uw8gX/pHJ5VA2qlKi/R2L1bG4vMD05vjranpzOKOTI7qvHk8GKxiOf8pe4x1Dk1sy/8Pb5xRU8UsVHrgphWu+hFxqsLdOX1PxwC335yMSR3mOvu5VNR+/N290U51z4cN/Kzo79P7XAnrXu6B+autG+hLxjY1PcflU6ONjqI042Pp46nBGAn9R+7QDXg0swdeyHmURpMc4x84o4jHEI8hUbKo66+mKeYSXRZAehdUbXBsDpVOUlEw0yvgLjUQXbeNL3z3sQ6vswzSxqnx6jtThPwy7Qp4L6NIk/Y9M5osXBZY/yb6VzVjPeJCDHkxoz1mpV7JUO5wGxZgQ4Q7rN3QgrFay7uXkd+N/h4V0eS2Zl+pny97Uu17v3rf7j1gJLxzIF5OXuSl71bl6gwLfgCf5XFOVMgKfkGq+zzUghl66pwLTY11qsDUHu9W9/6mFNwpKxzCH+nYcf0ve/wNQSwcI2ajKq1gEAADoCgAAUEsBAhQAFAAICAgAzUJZQ9Y3vbkZAAAAFwAAABYAAAAAAAAAAAAAAAAAAAAAAGdlb2dlYnJhX2phdmFzY3JpcHQuanNQSwECFAAUAAgICADNQllD2ajKq1gEAADoCgAADAAAAAAAAAAAAAAAAABdAAAAZ2VvZ2VicmEueG1sUEsFBgAAAAACAAIAfgAAAO8EAAAAAA=="></article>
           <?php  

              if (isset($_POST['funcion'])) {
                echo '                
                 <script type="text/javascript">
                     function myLittleConstruction(a,b) {
                       var applet = document.ggbApplet;
                       applet.evalCommand("'.$_POST['funcion'].'");
                       applet.evalCommand("A = ("+a+",0)");
                       applet.evalCommand("B = ("+b+",0)");
                     }
                   </script>                 
                ';
              }            
           ?>         

           <form id="graficar">      
              <br><br>
             <input type="button" class="btn btn-primary" value="GRAFICAR" <?php 
              if (isset($_POST['funcion'])) {
                echo 'onclick="myLittleConstruction('.$_POST['x0'].','.$_POST['x1'].')"';
              }
             ?> >
           </form>
         </div>


      
      <br><br><br><br><br><br><br><br>
      <div style="text-align: center;">
        <a id="boton" href="http://www.youtube.com/watch?v=GKwzBrzsPSU" target="_blank" type="button" class="btn btn-lg" style="background: gray; color: white">Vídeo</a>
        <a id="boton" href="../documentos/unidad7.pdf" target="_blank" type="button" class="btn btn-lg" style="background: #D40B3A; color: white">Documento</a>        
      </div>

      <br><br><br><br><br><br><br><br>


      <div id="disqus_thread"></div>
    <script type="text/javascript">
        /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
        var disqus_shortname = 'omegaacademy'; // required: replace example with your forum shortname

        /* * * DON'T EDIT BELOW THIS LINE * * */
        (function() {
            var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
            dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
            (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
        })();
    </script>
    <noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
    <a href="http://disqus.com" class="dsq-brlink">comments powered by <span class="logo-disqus">Disqus</span></a>
      
           
    </div> <!-- /container -->


    <footer>      
      <p class="text-center">
        &copy; Omega Academy &middot; Juntos por el conocimiento. <br>
        2014
      </p>
    </footer>     


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="../../js/collapse.js"></script>
    <script src="../../js/transition.js"></script>
    <script src="../../js/dropdown.js"></script>        
  </body>
</html>
