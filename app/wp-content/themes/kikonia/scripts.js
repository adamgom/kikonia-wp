// zmienne globalne
var $ = jQuery;
var b = $("body");
var sp = $("#showProducts");
var opd = $("#openProductDetails");
var spd = $("#showProductDetails");
var spdi = $("#showProductDetailsImages");
var JSONdata = [];
var JSONdata_filter = [];
var inRow = 4;
var selectedProduct = [];

noData('wczytywanie danych');

// pobrani danych JSON
$.getJSON('http://localhost/kikonia-wp/app/wp-json/kikonia/produkty', function(data) {
  this.JSONdata = data;
  this.JSONdata_filter = data;
  this.productsShow(this.JSONdata);
}.bind(this));

// brak danych
function noData(info) {
  this.sp.html(`
  <div class="content__type_group content__type_group--no_data">
  <h1> ${info} </h1></div>`);
}

// filterowanie danych zgodnie z wyborem
function selektor(IDcatch) {
  this.JSONdata_filter = [];
  for (var i=0; i < this.JSONdata.length; i++) {
    if (this.JSONdata[i].grupa_produktowa_ID == IDcatch) { this.JSONdata_filter.push(this.JSONdata[i]); }
  }
  
  if (JSONdata_filter.length) { this.productsShow(this.JSONdata_filter); } else { this.noData('brak danych'); }
}

// wyśietlanie danych
function productsShow(dane) {
  var PSmatter = '';
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
      PSmatter += `
      <div onclick="openProductDetails(` + dane[j].id_produktu + `)" class="content__type_item">
        <img class="content__type_item--img" src="` + dane[j].image1.productSmall + `" alt="">
        <span class="content__type_item--title">` + dane[j].tytul +  `</span>
      </div>` 
    }

    counterInRow += this.inRow;
    if (counterInRow + interval > productNumber) {interval = rest;}
    if (i < rows) {PSmatter += '</div><div class="row row--show_products">';}
  }

  this.sp.html('<div class="row row--show_products">' + PSmatter + '</div>');
}

function openProductDetails(ID) {
  for (var i = 0 ; i < this.JSONdata_filter.length ; i++ ) {
    if (JSONdata_filter[i].id_produktu == ID) {
      selectedProduct = this.JSONdata_filter[i];
    }
  }

  this.opd.addClass("product-details--active");
  productDetail(selectedProduct);
  // this.b.addClass("body-no-scroll");
}

function closeProductDetails() {
  this.opd.removeClass("product-details--active");
  // this.b.removeClass("body-no-scroll");
  this.spd.html('');
  this.spdi.html('');
}

function productDetail(sp) {
  var matter = `<h1> ${sp.tytul} </h1>`;
  var images = `<img src=" ${sp.image1.large} " alt="">`;

  if (sp.image2 != null) {
    images += `<img src=" ${sp.image2.large} " alt="">`;
  }
  if (sp.image3 != null) {
    images += `<img src=" ${sp.image3.large} " alt="">`;
  }
  this.spd.html(matter);
  this.spdi.html(images);
}

