document.addEventListener('DOMContentLoaded', async () => {
    let data = localStorage.getItem("data");
    if (!data) return false;
    document.querySelector("main").innerHTML = data;

    removeElements([".mw-editsection", "sup", ".metadata"]);
    changeImagesRef();
})

function removeElements(element_names) {
    element_names.forEach(element_name => {
        elements = document.querySelectorAll(element_name);
        elements.forEach(el => {
            el.remove();
        });
    })
}

function changeImagesRef() {
    elements = document.querySelectorAll("img");
    elements.forEach(el => {
        img_src = el.src;
        el.parentElement.href = img_src;
    })
}

document.getElementById("search-form").addEventListener("submit", (event) => {
    event.preventDefault();
    let title = document.getElementById("search-input").value.trim();
    if (title.includes(" ")) {
        title.replace(" ", "_");
    }
    window.location.href = `/wiki/${title}`;
})