const links = document.querySelectorAll('a[href*="#"]:not([href="#"])');

for (const link of links) {
    link.addEventListener('click', linkClickHandler);
}

function linkClickHandler(event) {
    if (location.hostname === this.hostname
        && this.pathname.replace(/^\//, "") === location.pathname.replace(/^\//, "")
    ) {
        event.preventDefault();

        let anchor = document.querySelector(this.hash);
        anchor = anchor.length ? anchor : document.querySelector(`[name="${this.hash.slice(1)}"]`);

        if (anchor.length) {
            scroll({
                top: anchor.offset().top,
                behavior: 'smooth',
            });
        }
    }
}

