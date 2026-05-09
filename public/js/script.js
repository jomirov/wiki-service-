document.addEventListener('DOMContentLoaded', () => {
    let data = localStorage.getItem("data");
    if (!data) return false;
    document.querySelector("main").innerHTML = data;

    removeElements([".mw-editsection", "sup", ".metadata"]);
    changeImagesRef();
    thColorChange();
    tdColorChange();
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

function thColorChange() {
    elements = document.querySelectorAll("th");
    elements.forEach(el => {
        styleAttr = el.getAttribute("style");
        if (styleAttr && styleAttr.includes("color")) {
            el.style.backgroundColor = "#d8e4ff";
            el.style.color = "#2268ff";
        } else if (styleAttr && styleAttr.includes("background")) {
            el.style.background = "#d8e4ff";
        }
    })
}

function tdColorChange() {
    elements = document.querySelectorAll("td");
    elements.forEach(el => {
        styleAttr = el.getAttribute("style");
        if (styleAttr && (styleAttr.includes("bold") || styleAttr.includes("background"))) {
            el.style.background = "#d8e4ff";
            el.style.color = "#2268ff";
        }
    })
}
