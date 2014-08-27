function borrar() {
  document.getElementById("decimal").value = "";
  document.getElementById("binary").value = "";
  document.getElementById("signo").value = "";
  document.getElementById("exponente").value = "";
  document.getElementById("mantisa").value = "";
}

function decimal2(str) {
  
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {            
      document.getElementById("signo").value = xmlhttp.responseText;            
    }
  }        
  xmlhttp.open("GET","../../../controllers/estandarIEEE/getSign.php?decimal="+str,true);
  xmlhttp.send();

  var xmlhttp2 = new XMLHttpRequest();
  xmlhttp2.onreadystatechange = function() {
    if (xmlhttp2.readyState == 4 && xmlhttp2.status == 200) {            
      document.getElementById("binary").value = xmlhttp2.responseText;            
    }
  }        
  xmlhttp2.open("GET","../../../controllers/estandarIEEE/getBinary.php?decimal="+str,true);
  xmlhttp2.send();

  var xmlhttp3 = new XMLHttpRequest();
  xmlhttp3.onreadystatechange = function() {
    if (xmlhttp3.readyState == 4 && xmlhttp3.status == 200) {            
      document.getElementById("exponente").value = xmlhttp3.responseText;            
    }
  }        
  xmlhttp3.open("GET","../../../controllers/estandarIEEE/getExponent.php?decimal="+str,true);
  xmlhttp3.send();

  var xmlhttp4 = new XMLHttpRequest();
  xmlhttp4.onreadystatechange = function() {
    if (xmlhttp4.readyState == 4 && xmlhttp4.status == 200) {            
      document.getElementById("mantisa").value = xmlhttp4.responseText;
    }
  }        
  xmlhttp4.open("GET","../../../controllers/estandarIEEE/getMantisa.php?decimal="+str,true);
  xmlhttp4.send();  
}

function binary2(str) {
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {            
      document.getElementById("signo").value = xmlhttp.responseText;            
    }
  }        
  xmlhttp.open("GET","../../../controllers/estandarIEEE/getSign2.php?binary="+str,true);
  xmlhttp.send();

  var xmlhttp2 = new XMLHttpRequest();
  xmlhttp2.onreadystatechange = function() {
    if (xmlhttp2.readyState == 4 && xmlhttp2.status == 200) {            
      document.getElementById("decimal").value = xmlhttp2.responseText;            
    }
  }        
  xmlhttp2.open("GET","../../../controllers/estandarIEEE/getDecimal.php?binary="+str,true);
  xmlhttp2.send();

  var xmlhttp3 = new XMLHttpRequest();
  xmlhttp3.onreadystatechange = function() {
    if (xmlhttp3.readyState == 4 && xmlhttp3.status == 200) {            
      document.getElementById("exponente").value = xmlhttp3.responseText;            
    }
  }        
  xmlhttp3.open("GET","../../../controllers/estandarIEEE/getExponent2.php?binary="+str,true);
  xmlhttp3.send();

  var xmlhttp4 = new XMLHttpRequest();
  xmlhttp4.onreadystatechange = function() {
    if (xmlhttp4.readyState == 4 && xmlhttp4.status == 200) {            
      document.getElementById("mantisa").value = xmlhttp4.responseText;
    }
  }        
  xmlhttp4.open("GET","../../../controllers/estandarIEEE/getMantisa2.php?binary="+str,true);
  xmlhttp4.send();
}

function inversa() {
  if (document.getElementById("signo").value.length == 1 && document.getElementById("exponente").value.length == 8
      && document.getElementById("mantisa").value.length == 23) {

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {            
        document.getElementById("decimal").value = xmlhttp.responseText;            
      }
    }        
    xmlhttp.open("GET","../../../controllers/estandarIEEE/getDecimal3.php?signo="+document.getElementById("signo").value+"&exponente="+document.getElementById("exponente").value+"&mantisa="+document.getElementById("mantisa").value,true);
    xmlhttp.send();

    var xmlhttp2 = new XMLHttpRequest();
    xmlhttp2.onreadystatechange = function() {
      if (xmlhttp2.readyState == 4 && xmlhttp2.status == 200) {            
        document.getElementById("binary").value = xmlhttp2.responseText;            
      }
    }        
    xmlhttp2.open("GET","../../../controllers/estandarIEEE/getBinary3.php?signo="+document.getElementById("signo").value+"&exponente="+document.getElementById("exponente").value+"&mantisa="+document.getElementById("mantisa").value,true);
    xmlhttp2.send();


  }
}