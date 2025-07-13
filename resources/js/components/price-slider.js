import noUiSlider from "nouislider";
import "nouislider/dist/nouislider.css";

export function initPriceSlider(minPrice, maxPrice) {
    const slider = document.getElementById("price-slider");

    if (!slider) return;
    
    const priceMin = document.getElementById("price_min");
    const priceMax = document.getElementById("price_max");
    const minLabel = document.getElementById("min-label");
    const maxLabel = document.getElementById("max-label");

    const currentMin = parseFloat(priceMin.value) || minPrice;
    const currentMax = parseFloat(priceMax.value) || maxPrice;

    noUiSlider.create(slider, {
        start: [currentMin, currentMax],
        connect: true,
        range: {
            min: minPrice,
            max: maxPrice,
        },
        step: 10,
    });

    slider.noUiSlider.on("update", (values) => {
        const [valMin, valMax] = values.map((v) => Math.round(v));
        priceMin.value = valMin;
        priceMax.value = valMax;
        minLabel.textContent = `${valMin} RSD`;
        maxLabel.textContent = `${valMax} RSD`;
    });

    // Set initial labels
    minLabel.textContent = `${currentMin} RSD`;
    maxLabel.textContent = `${currentMax} RSD`;
}
