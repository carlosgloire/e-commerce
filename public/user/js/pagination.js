const content = document.getElementById('content');
        const pagination = document.getElementById('pagination');
        const itemsPerPage = 8; // Change the number of items per page

        let currentPage = 1;

        function showPage(pageNumber) {
            const items = content.children;
            const start = (pageNumber - 1) * itemsPerPage;
            const end = start + itemsPerPage;

            for (let i = 0; i < items.length; i++) {
                items[i].style.display = i >= start && i < end ? 'block' : 'none';
            }
        }

        function updatePagination() {
            const itemCount = content.children.length;
            const pageCount = Math.ceil(itemCount / itemsPerPage);

            pagination.innerHTML = '';

            for (let i = 1; i <= pageCount; i++) {
                const li = document.createElement('aside');
                li.textContent = i;
                li.addEventListener('click', () => {
                    currentPage = i;
                    showPage(i);
                    updatePagination();
                });

                if (i === currentPage) {
                    li.classList.add('active');
                }

                pagination.appendChild(li);
            }
        }

        showPage(currentPage);
        updatePagination();