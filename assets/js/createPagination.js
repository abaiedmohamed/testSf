function createPagination($totalPages) {
    $('#pagination-container').html('');
    $('#movies').append(`<div id="pagination-container"></div>`);


    let paginationHtml = `
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul>
        </nav>
    `;
    $('#pagination-container').html(paginationHtml);

    var pageItemTemplate = `<li class="page-item page-item-value" data-page=#PAGE#><a class="page-link" href="#">#NUM#</a></li>`;

    for (var i = 1; i <= $totalPages; i++) {
        var newPageItem = pageItemTemplate.replace('#NUM#', i).replace('#PAGE#', i);
        $(newPageItem).insertBefore('.pagination .page-item:last');
    }
}

export { createPagination }