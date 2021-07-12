var draw = document.getElementById("area_de_dibujo");
var papel = draw.getContext("2d");
var xf, yf, xi, yi;
var colorcito = document.getElementById("colores");
var pintar = false;
var ancho = document.getElementById("ancho");

// Funciom y eventos para dibujar usando el mouse en canvas

draw.addEventListener("mousedown", dibujando, false);
function dibujando(evento) {
  var pintar = true;
  console.log(evento);
  var xi = evento.offsetX;
  var yi = evento.offsetY;
  draw.addEventListener("mousemove",function(evento) {
    if (pintar && draw.onmousedown ) {
      var xf = evento.offsetX;
      var yf = evento.offsetY;
      dibujarlinea(colorcito, xi, yi, xf, yf, papel);
      xi = xf;
      yi = yf;
      draw.addEventListener("moveup", apagando);
      draw.addEventListener("mouseout", apagando)
      function apagando (evento3) {
        pintar = false;
      //  console.log(evento3);}
}
}
}, false);
}

// Funcion para limpiar el canvas
function limpiar() {
  draw.width = draw.width;
}

// funcion para dibujar en el canvas

function dibujarlinea(color, xi, yi, xf, yf, lienzo)
{
  lienzo.beginPath();
  lienzo.strokeStyle = color.value;
  lienzo.lineWidth = ancho.value;
  lienzo.lineJoin = "round";
  lienzo.moveTo(xi, yi);
  lienzo.lineTo(xf, yf);
  lienzo.stroke();
  lienzo.closePath();
}
