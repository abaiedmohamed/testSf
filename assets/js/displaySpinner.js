function displaySpinner(selector) {    
    $(selector).html(`<div class="spinner-border" role="status">
        <span class="sr-only">Loading...</span>
        </div></div>`).css({ "background-color": "rgba(6, 6, 6, 0.19)" });
}

export { displaySpinner }