let tradeButton = document.querySelectorAll("#tradeBtn");
let modalCurrency = document.getElementById("modalCurrency");
let modalAvailable = document.getElementById("modalAvailable");
let modalShop = document.getElementById("modalShop");
let modalMaxFiat = document.getElementById("modalMaxFiat");

tradeButton.forEach(function (button) {
    button.addEventListener("click", function (event) {
        let button = event.currentTarget;

        let shopId = button.getAttribute("data-shopId");
        let currencyFiat = button.getAttribute("data-currencyFiat");
        let availableFiat = button.getAttribute("data-availableFiat");

        modalShop.setAttribute("value", shopId);
        modalMaxFiat.setAttribute("value", availableFiat);
        modalCurrency.innerHTML = currencyFiat;
        modalAvailable.innerHTML = availableFiat;
    });
});
