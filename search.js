document.getElementById("searchForm").addEventListener("submit", function(event) {
    event.preventDefault(); // Prevent the form from submitting in the traditional way

    var searchQuery = document.getElementById("searchQuery").value;
    if (searchQuery) {
        var googleSearchURL = "https://www.google.com/search?q=" + encodeURIComponent(searchQuery);
        window.open(googleSearchURL, "_blank"); // Open Google search results in a new tab/window
    } else {
        alert("Please enter a search query!");
    }
});

