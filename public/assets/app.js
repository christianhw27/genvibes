const searchInput = document.getElementById('catalogSearch');
const featureFilter = document.getElementById('featureFilter');
const cards = Array.from(document.querySelectorAll('.catalog-card'));
const emptyState = document.getElementById('emptyCatalog');

function filterCatalog() {
    if (!cards.length) {
        return;
    }

    const query = (searchInput?.value || '').trim().toLowerCase();
    const feature = featureFilter?.value || '';
    let visible = 0;

    cards.forEach((card) => {
        const matchesQuery = !query || card.dataset.search.includes(query);
        const matchesFeature = !feature || (card.dataset.features || '').includes(feature);
        const show = matchesQuery && matchesFeature;

        card.classList.toggle('hidden', !show);
        if (show) {
            visible += 1;
        }
    });

    emptyState?.classList.toggle('hidden', visible !== 0);
}

searchInput?.addEventListener('input', filterCatalog);
featureFilter?.addEventListener('change', filterCatalog);

const contactForm = document.getElementById('contactForm');

contactForm?.addEventListener('submit', (event) => {
    event.preventDefault();

    const name = document.getElementById('contactName')?.value.trim() || '';
    const subject = document.getElementById('contactSubject')?.value.trim() || 'Contact Genvibes';
    const message = document.getElementById('contactMessage')?.value.trim() || '';
    const body = `Nama: ${name}\n\n${message}`;
    const isMobile = window.matchMedia('(max-width: 767px), (pointer: coarse)').matches
        || /Android|iPhone|iPad|iPod|IEMobile|Opera Mini/i.test(navigator.userAgent);

    if (!isMobile) {
        const gmailUrl = new URL('https://mail.google.com/mail/');

        gmailUrl.searchParams.set('view', 'cm');
        gmailUrl.searchParams.set('fs', '1');
        gmailUrl.searchParams.set('to', 'genvibes.id@gmail.com');
        gmailUrl.searchParams.set('su', subject);
        gmailUrl.searchParams.set('body', body);

        window.open(gmailUrl.toString(), '_blank', 'noopener');
        return;
    }

    const mailtoUrl = new URL('mailto:genvibes.id@gmail.com');

    mailtoUrl.searchParams.set('subject', subject);
    mailtoUrl.searchParams.set('body', body);

    window.open(mailtoUrl.toString(), '_blank', 'noopener');
});
