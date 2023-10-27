<!DOCTYPE html>
<html>
<head>
    <title>Pagination Example</title>
    <style>
        .pagination {
            display: flex;
            list-style: none;
        }

        .pagination p {
            margin: 5px;
            padding: 5px 10px;
            border: 1px solid #ccc;
            cursor: pointer;
        }

        .pagination p.active {
            background-color: #0074D9;
            color: #fff;
        }
    </style>
</head>
<body>
    <div id="content">
        <!-- Content goes here, e.g., a list of items -->
        <p class="item">Item 1</p>
        <p class="item">Item 2</p>
        <p class="item">Item 3</p>
        <p class="item">Item 4</p>
        <p class="item">Item 5</p>
        <p class="item">Item 6</p>
        <p class="item">Item 7</p>
        <p class="item">Item 8</p>
        <p class="item">Item 9</p>
        <p class="item">Item 10</p>
        <p class="item">Item 11</p>
        <p class="item">Item 12</p>
        <p class="item">Item 13</p>
        <p class="item">Item 14</p>
        <p class="item">Item 15</p>
        <p class="item">Item 16</p>
        <p class="item">Item 17</p>
        <p class="item">Item 18</p>
        <p class="item">Item 19</p>
        <p class="item">Item 20</p>
    </div>

    <ul class="pagination" id="pagination"></ul>

    <script src="script.js">
    </script>
</body>
</html>
