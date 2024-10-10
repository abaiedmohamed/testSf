function getAllGenres() {
    $.ajax({
        url: Routing.generate('app_genre__invoke'),
        type: "GET",
        success: function (data) {
            const checkboxContainer = $('#genre');
            data.response.genres.forEach(genre => {
                let checkboxHtml = `
                    <div class="form-check">
                        <input class="form-check-input form-control genre-item" type="checkbox" value="${genre.id}" id="checkbox-${genre.id}">
                        <label class="form-check-label" for="checkbox-${genre.id}">
                            ${genre.name}
                        </label>
                    </div>
                    `;
                checkboxContainer.append(checkboxHtml);
            });

        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log(textStatus, errorThrown);
        }
    });
}

export { getAllGenres }