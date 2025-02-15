<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Поиск комментариев</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body class="p-8">
    <form id="searchForm" class="mb-4">
        <input type="text" id="searchInput" class="border p-2" placeholder="Введите текст для поиска" required minlength="3">
        <button type="submit" class="ml-2 bg-blue-500 text-white p-2">Найти</button>
    </form>
    <div id="results" class="mt-4"></div>

    <script>
        $(document).ready(function(){
            $('#searchForm').on('submit', function(event){
                event.preventDefault();
                const query = $('#searchInput').val();
                if (query.length < 3) return;

                $.ajax({
                    type: "POST",
                    url: "core/search.php",
                    data: {query: query},
                    success: function(data) {
                        $('#results').html(data);
                    }
                });
            });
        });
    </script>
</body>
</html>