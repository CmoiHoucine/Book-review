document.addEventListener('DOMContentLoaded', function() {
    let searchInput = document.getElementById('search');
    let resultsContainer = document.getElementById('search-results');

    searchInput.addEventListener("input", function() {
        let query = searchInput.value.trim();

        // Si la recherche est trop courte, on vide et on arrête
        if (query.length < 3) {
            resultsContainer.innerHTML = '';
            return;
        }

        fetch('../Controller/livesearch_controller.php?query=' + encodeURIComponent(query))
            .then(response => response.text())  
            .then(data => {
                resultsContainer.innerHTML = data;
            })
            .catch(error => {
                console.error('Erreur lors de la recherche :', error);
                resultsContainer.innerHTML = '<p>Erreur lors de la recherche.</p>';
            });
    });
});
