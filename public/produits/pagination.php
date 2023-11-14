<script>
// JavaScript code here
const itemsPerPage = 5; // Change the number of items per page

function showPage(categoryName, pageNumber) {
    const content = document.getElementById('content' + categoryName);
    const pagination = document.getElementById('pagination' + categoryName);

    const items = content.children;
    const start = (pageNumber - 1) * itemsPerPage;
    const end = start + itemsPerPage;

    for (let i = 0; i < items.length; i++) {
        items[i].style.display = i >= start && i < end ? 'block' : 'none';
    }
}

function updatePagination(categoryName, currentPage) {
    const content = document.getElementById('content' + categoryName);
    const pagination = document.getElementById('pagination' + categoryName);

    const items = content.children;
    const itemCount = items.length;
    const pageCount = Math.ceil(itemCount / itemsPerPage);

    pagination.innerHTML = '';

    for (let i = 1; i <= pageCount; i++) {
        const li = document.createElement('aside');
        li.textContent = i;
        li.addEventListener('click', () => {
            // Remove the 'active' class from the previously active element
            const prevActive = pagination.querySelector('.active');
            if (prevActive) {
                prevActive.classList.remove('active');
            }
            
            showPage(categoryName, i);
            li.classList.add('active');
        });

        if (i === currentPage) {
            li.classList.add('active');
        }

        pagination.appendChild(li);
    }
}

// Initialize pagination for each category
<?php foreach (array_keys($categories) as $categoryName) { ?>
    showPage('<?php echo $categoryName; ?>', 1);
    updatePagination('<?php echo $categoryName; ?>', 1);
<?php } ?>
</script>
