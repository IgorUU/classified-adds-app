import noUiSlider from "nouislider";
import "nouislider/dist/nouislider.css";

export function initPriceSlider(minPrice, maxPrice) {
    const slider = document.getElementById("price-slider");

    if (!slider) return;

    noUiSlider.create(slider, {
        start: [minPrice, maxPrice],
        connect: true,
        range: {
            min: minPrice,
            max: maxPrice,
        },
        step: 10,
    });

    const priceMin = document.getElementById("price_min");
    const priceMax = document.getElementById("price_max");
    const minLabel = document.getElementById("min-label");
    const maxLabel = document.getElementById("max-label");

    slider.noUiSlider.on("update", (values) => {
        const [valMin, valMax] = values.map((v) => Math.round(v));
        priceMin.value = valMin;
        priceMax.value = valMax;
        minLabel.textContent = `${valMin} RSD`;
        maxLabel.textContent = `${valMax} RSD`;
    });

    // Set initial labels
    minLabel.textContent = `${minPrice} RSD`;
    maxLabel.textContent = `${maxPrice} RSD`;
}
