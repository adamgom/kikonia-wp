// zmienne globalne
var $ = jQuery;
var showProducts = $(".showProducts");
var opd = $(".openProductDetails");
var spd = $(".showProductDetails");
var JSONdata = [];
var JSONdata_filter = [];
var inRow = 4;

brakDanych('wczytywanie danych');

// pobrani danych JSON
$.getJSON('http://localhost/kikonia-wp/app/wp-json/kikonia/produkty', function(data) {
  this.JSONdata = data;
  this.JSONdata_filter = data;
  this.productsShow(this.JSONdata);
}.bind(this));

// filterowanie danych zgodnie z wyborem
function selektor(IDcatch) {
  this.JSONdata_filter = [];
  for (var i=0; i < this.JSONdata.length; i++) {
    if (this.JSONdata[i].grupa_produktowa_ID == IDcatch) { this.JSONdata_filter.push(this.JSONdata[i]); }
  }
  
  if (JSONdata_filter.length > 0 ) { this.productsShow(this.JSONdata_filter); } else { this.brakDanych('brak danych'); }
}

// brak danych
function brakDanych(info) {
  this.showProducts.html(`
    <div class="content__type-group">
      <a class="content__type-item-link" href="#">  
        <div class="content__type-item">
           <h1> ${info} </h1>
        </div>
      </a>
    </div>
  `);
}

// wywietlanie danych
function productsShow(dane) {
  var matter = '';
  var counterInRow = 0;
  var interval = 0;
  var productNumber = 0;
  var rows = 0;
  var rest = 0;

  productNumber = dane.length;
  rows = Math.floor(productNumber / this.inRow);

  if (rows > 0) {
    rest = productNumber - rows * this.inRow;
    interval = this.inRow;
  } else {
    rest = productNumber;
    interval = productNumber;
  }

  for (var i = 0 ; i < rows + 1 ; i++) {
    for (var j = counterInRow ; j < counterInRow + interval ; j++ ) {
      matter += `
      <div onclick="openProductDetails(` + dane[j].id_produktu + `)" class="content__type-item">
        <img class="content__type-item-img" src="` + dane[j].sizes.productSmall + `" alt="">
        <span class="content__type-item-title">` + dane[j].tytul +  `</span>
      </div>` 
    }

    counterInRow += this.inRow;
    if (counterInRow + interval > productNumber) {interval = rest;}
    if (i < rows) {matter += '</div><div class="row">';}
  }

  this.showProducts.html(' <div class="content__type-group"><div class="row">' + matter + '</div></div> ');
}

function openProductDetails(ID) {
  var selectedProduct;

  for (var i = 0 ; i < this.JSONdata_filter.length ; i++ ) {
    if (JSONdata_filter[i].id_produktu == ID) {
      selectedProduct = this.JSONdata_filter[i];
    }
  }

  this.opd.addClass("search-overlay--active");
  this.spd.html(`<h1> ${selectedProduct.tytul} </h1><img src="  ${selectedProduct.sizes.large} " alt=""> `);
}

function closeProductDetails() {
  this.opd.removeClass("search-overlay--active");
}
