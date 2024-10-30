document.addEventListener("scroll", miga_scroll_header_handle_scroll);


function miga_scroll_header_handle_scroll() {
	var pos = (document.documentElement && document.documentElement.scrollTop) || document.body.scrollTop;
	var scrollDepth = document.getElementById("miga_scroll_header") ? document.getElementById("miga_scroll_header").getAttribute("data-scrolldepth") : 200;

	if (pos > scrollDepth) {
		document.querySelector("header").classList.add("scrolled")
		document.querySelector("body").classList.add("scrolled")
	} else {
		document.querySelector("header").classList.remove("scrolled")
		document.querySelector("body").classList.remove("scrolled")
	}
}
miga_scroll_header_handle_scroll();
