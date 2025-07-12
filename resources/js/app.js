import "./bootstrap";
import { initPriceSlider } from "./components/price-slider";

import Alpine from "alpinejs";

window.Alpine = Alpine;

document.addEventListener("DOMContentLoaded", () => {
    Alpine.start();
    setupSlider();
});

function setupSlider() {
    const sliderEl = document.getElementById("price-slider");

    if (!sliderEl) return;

    const minPrice = parseInt(sliderEl.dataset.min);
    const maxPrice = parseInt(sliderEl.dataset.max);

    initPriceSlider(minPrice, maxPrice);
}
