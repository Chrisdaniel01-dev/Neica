// FILTER SCRIPT //
document.querySelectorAll('.filter-tab').forEach(tab => {

    tab.addEventListener('click', () => {

        document.querySelectorAll('.filter-tab')
            .forEach(t => t.classList.remove('active'));

        tab.classList.add('active');

        const filter = tab.dataset.filter;
        const cards = document.querySelectorAll('.project-full-card');

        cards.forEach(card => {

            const category = card.dataset.category;

            if (filter === 'all' || category === filter) {
                card.style.display = 'block';
            } else {
                card.style.display = 'none';
            }

        });

    });

});