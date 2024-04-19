<?php include 'header.php' ?>

<section class="lawyers" id="lawyers">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="section-title-main">
                    <h2 class="section-title">Search Your Lawyer</h2>
                </div>
            </div>
        </div>

        <!-- This empty div will be populated with search results using AJAX -->
        <div id="searchResults" class="row justify-content-center mt-4"></div>

        <!-- Search input form -->
        <div class="row justify-content-center mt-4">
            <div class="col-md-6">
                <form id="searchForm" class="form-inline">
                    <div class="input-group">
                        <input class="form-control" type="search" placeholder="Search Name/Number/Location" aria-label="Search" id="searchInput">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button" id="searchButton">Search</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section><br>

<?php include 'footer.php' ?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('#searchButton').click(function() {
        searchLawyers();
    });

    $('#searchInput').keypress(function(event) {
        if (event.which === 13) {
            searchLawyers();
        }
    });

    function searchLawyers() {
        var searchQuery = $('#searchInput').val().trim(); // Trim any leading or trailing spaces
        if (searchQuery !== '') {
            $.ajax({
                url: 'search_lawyers.php',
                type: 'GET',
                data: { search: searchQuery },
                dataType: 'html', // Expecting HTML response for displaying search results
                success: function(response) {
                    $('#searchResults').html(response); // Populate search results in the designated div
                },
                error: function() {
                    alert('Error fetching search results.');
                }
            });
        } else {
            $('#searchResults').html('<div class="col-md-12 text-center"><p>No search parameter provided.</p></div>');
        }
    }
});
</script>
