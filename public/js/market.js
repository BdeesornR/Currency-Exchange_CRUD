/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!********************************!*\
  !*** ./resources/js/market.js ***!
  \********************************/
var tradeButton = document.querySelectorAll("#tradeBtn");
var modalCurrency = document.getElementById("modalCurrency");
var modalAvailable = document.getElementById("modalAvailable");
var modalShop = document.getElementById("modalShop");
var modalMaxFiat = document.getElementById("modalMaxFiat");
tradeButton.forEach(function (button) {
  button.addEventListener("click", function (event) {
    var button = event.currentTarget;
    var shopId = button.getAttribute("data-shopId");
    var currencyFiat = button.getAttribute("data-currencyFiat");
    var availableFiat = button.getAttribute("data-availableFiat");
    modalShop.setAttribute("value", shopId);
    modalMaxFiat.setAttribute("value", availableFiat);
    modalCurrency.innerHTML = currencyFiat;
    modalAvailable.innerHTML = availableFiat;
  });
});
/******/ })()
;