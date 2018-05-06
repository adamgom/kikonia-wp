// zmienne globalne
// var n = $('.content__list-group').children('div').length;
var $ = jQuery;
var wDane = $(".wDane");
var daneJSON = [];
var daneJSON_filtr = [];
var wRzedzie = 4;

brakDanych('wczytywanie danych');

// pobrani danych JSON
$.getJSON('http://localhost/kikonia-wp/app/wp-json/kikonia/produkty', function(data) {
  this.daneJSON = data;
  this.wyswietlDane(this.daneJSON);
}.bind(this));

// filtrowanie danych zgodnie z wyborem
function selektor(IDcatch) {
  this.daneJSON_filtr = [];
  for (var i=0; i < this.daneJSON.length; i++) {
    if (this.daneJSON[i].grupa_produktowa_ID == IDcatch) { this.daneJSON_filtr.push(this.daneJSON[i]); }
  }
  
  if (daneJSON_filtr.length > 0 ) { this.wyswietlDane(this.daneJSON_filtr); } else { this.brakDanych('brak danych'); }
}

// brak danych
function brakDanych(info) {
  this.wDane.html(`
    <div class="content__list-group">
      <a class="content__list-item-link" href="#">  
        <div class="content__list-item">
           <h1> ${info} </h1>
        </div>
      </a>
    </div>
  `);
}

// wywietlanie danych
function wyswietlDane(dane) {
  var tresc = '';
  var licznikWRzedzie = 0;
  var interwal = 0;
  var l = 0;
  var rzedy = 0;
  var reszta = 0;

  l = dane.length;
  rzedy = Math.floor(l / this.wRzedzie);

  if (rzedy > 0) {reszta = l - rzedy * this.wRzedzie;} else {reszta = l;}
  if (rzedy > 0) {interwal = this.wRzedzie;} else {interwal = reszta;}

  var header = '<div class="content__list-group"><div class="row">';

  for (var i = 0 ; i < rzedy + 1 ; i++) {
    for (var j = licznikWRzedzie ; j < licznikWRzedzie + interwal ; j++ ) {
      tresc += `
      <div class="content__list-item">
        <img class="content__list-item-img" src="` + dane[j].img + `" alt="">
        <span class="content__list-item-title">`  + dane[j].id_produktu + ',' + dane[j].tytul +  `</span>
      </div>` 
    }

    licznikWRzedzie += this.wRzedzie;
    if (licznikWRzedzie + interwal> l) {interwal = reszta;}
    if (i < rzedy) {tresc += '</div><div class="row">';}
  }
  
  var footer = '</div></div>';

  this.wDane.html(header + tresc + footer);
}

module.exports = wyswietlDane;
module.exports = brakDanych;
module.exports = selektor;