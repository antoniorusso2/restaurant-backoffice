import "./bootstrap";

import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();

// modal trigger
const modal = document.getElementById("modal");

const trigger = document.getElementById("modal-trigger");

trigger.onclick = () => {
    // console.log(modal);
    modal.classList.toggle("hidden");
};

// modal handles close also for the x button with bubbling js
modal.onclick = () => {
    modal.classList.toggle("hidden");
};
