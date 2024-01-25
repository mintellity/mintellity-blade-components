document.addEventListener("DOMContentLoaded", function () {
    const growers = document.querySelectorAll(".grow-wrap");

    growers.forEach((grower) => {
        const textarea = grower.querySelector("textarea");

        grower.dataset.replicatedValue = textarea.value;

        textarea.addEventListener("input", () => {
            grower.dataset.replicatedValue = textarea.value;
        });
    });

});
