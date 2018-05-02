// zmienne
var $ = jQuery;
// var n = $('.content__list-group').children('div').length;
var pokaz = $(".pokaz");
var adres = 'http://localhost/kikonia-wp/app/wp-json/kikonia/produkty';
var daneJSON = [];
var daneJSON_filtr = [];
var wRzedzie = 4;
var l = 0;
var rzedy = 0;
var reszta = 0;

// pobrani danych JSON
$.getJSON(this.adres, function(data) {
  this.daneJSON = data;
  console.log(data);
  
  //ustalenie zmiennych dla pełnego zestawu danych
  this.l = this.daneJSON.length;
  this.rzedy = Math.floor(this.l / this.wRzedzie);
  
  if (this.rzedy > 0) {
    this.reszta = this.l - this.rzedy * this.wRzedzie;
  } else {
    this.reszta = this.l;
  }
  
  this.wyswietlDane(this.daneJSON);
}.bind(this));

// filtrowanie danych
function selektor(IDcatch) {
  // filtracja danych zgodnie z wyborem
  this.daneJSON_filtr = [];
  for (var i=0; i < this.daneJSON.length; i++) {
    if (this.daneJSON[i].grupa_produktowa_ID == IDcatch) {
      this.daneJSON_filtr.push(this.daneJSON[i]);
    }
  }
  
  // ustalenie zmiennych dla zestawu wyfiltorwanych danych
  // && this.l > this.wRzedzie * this.rzedy
  if (daneJSON_filtr.length > 0 ) {
    this.l = daneJSON_filtr.length;
    this.rzedy = Math.floor(this.l / this.wRzedzie);
    if (this.rzedy > 0 ||  this.l > this.wRzedzie * this.rzedy ) {
      this.reszta = this.l - this.rzedy * this.wRzedzie;
    } else {
      this.reszta = this.l;
    }
    this.wyswietlDane(this.daneJSON_filtr);
  } else {
    this.l = 0;
    this.rzedy = 0;
    this.reszta = 0;
    this.brakDanych();
  }
}

// brak danych
function brakDanych() {
  this.pokaz.html(`
    <div class="content__list-group">
      <a class="content__list-item-link" href="#">  
        <div class="content__list-item">
           <h1> brak danych </h1>
        </div>
      </a>
    </div>
  `);
}

// wywietlanie danych
function wyswietlDane(dane) {
  var zawartosc = '';
  var licznikWierszy = 0;
  var licznikWRzedzie = 0;
  var interwal = 0;
  if (this.rzedy > 0 ) {
    interwal = this.wRzedzie;
  } else {
    interwal = this.reszta;
  }

  console.log('===============');
  console.log('l: ' + this.l + ', wRz: ' +  this.wRzedzie  + ', rzędy: ' +  this.rzedy  + ', resz: ' + this.reszta + ', int: ' + interwal);

  var header = '<div class="content__list-group"><div class="row">';

  for (var i = 0 ; i < this.rzedy + 1 ; i++) {
    console.log('--------------');
    // console.log('wiersz ' + i);
    
      console.log('licznik w rzędzie przed pętlą - ' + licznikWRzedzie);
      console.log('interwał przed pętlą - ' + interwal);

      for (var j = licznikWRzedzie ; j < licznikWRzedzie + interwal ; j++ ) {
        console.log('produkt ' + j + ', ID ' + dane[j].id_produktu);
        zawartosc += `
        <a class="content content__list-item-link" href="#">  
          <div class="content__list-item">
            <img class="content__list-item-img" src="` + dane[j].img + `" alt="">
            <span class="content__list-item-title">`  + dane[j].id_produktu + ',' + dane[j].tytul  +  `</span>
          </div>
        </a>` 
      }
      
      console.log('info: ' + this.l + ',' +  this.wRzedzie  + ',' +  this.rzedy  + ',' + this.reszta + ',' + interwal + ', lwr: ' + licznikWRzedzie);

      licznikWRzedzie += this.wRzedzie;
      console.log('info: ' + this.l + ',' +  this.wRzedzie  + ',' +  this.rzedy  + ',' + this.reszta + ',' + interwal + ', lwr: ' + licznikWRzedzie);
      
      if (licznikWRzedzie + interwal> this.l) {
        interwal = this.reszta;
      }
      console.log('info: ' + this.l + ',' +  this.wRzedzie  + ',' +  this.rzedy  + ',' + this.reszta + ',' + interwal + ', lwr: ' + licznikWRzedzie);
      console.log('licznik w rzędzie po pętli - ' + licznikWRzedzie);
      console.log('interwał po pętli, do nast. - ' + interwal);

    if (i < this.rzedy) zawartosc += '</div><div class="row">';
  }
  
  var footer = '</div></div>';

  this.pokaz.html(header + zawartosc + footer);
  console.log('--------------');
  console.log('l: ' + this.l + ', wRz: ' +  this.wRzedzie  + ', rzędy: ' +  this.rzedy  + ', resz: ' + this.reszta + ', int: ' + interwal);
}
