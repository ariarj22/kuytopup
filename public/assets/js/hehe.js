function search() {
    let input = document.getElementById("inputan").value.toLowerCase();
    let gallery = document.getElementById("gallery");
    let galleryItems = gallery.getElementsByClassName("col-xl-3");

    for (let i = 0; i < galleryItems.length; i++) {
        let title = galleryItems[i].getAttribute("title").toLowerCase();
        if (title.includes(input)) {
            galleryItems[i].style.display = "";
        } else {
            galleryItems[i].style.display = "none";
        }
    }
}
