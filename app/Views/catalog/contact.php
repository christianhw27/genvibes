<section class="relative isolate overflow-hidden bg-brand px-5 py-8 text-white md:px-10 md:py-10">
    <div class="absolute inset-0 hero-mesh"></div>
    <div class="absolute inset-0 premium-grid opacity-20"></div>

    <div class="relative mx-auto flex max-w-7xl flex-col gap-6 sm:flex-row sm:items-center sm:justify-between">
        <a class="inline-flex w-fit rounded-full border border-white/25 bg-white/10 px-5 py-3 text-sm font-black backdrop-blur transition hover:-translate-y-0.5 hover:bg-white/15" href="<?= url('/') ?>">Kembali ke Katalog</a>
        <div class="rounded-[1.25rem] bg-white px-5 py-3 shadow-2xl shadow-blue-950/20">
            <img class="h-14 w-52 object-contain" src="<?= asset('genvibes-logo.jpg') ?>" alt="Genvibes">
        </div>
    </div>
</section>

<section class="contact-stage bg-slate-50 px-5 py-10 md:px-10 md:py-16">
    <div class="mx-auto grid max-w-7xl gap-8 lg:grid-cols-[.88fr_1.12fr] lg:items-start">
        <div class="rounded-[2rem] border border-blue-100 bg-white p-6 shadow-xl shadow-blue-950/5 md:p-8">
            <p class="text-sm font-black uppercase tracking-normal text-brand">Contact Us</p>
            <h1 class="mt-3 text-4xl font-black leading-tight tracking-normal text-slate-950 md:text-6xl">Kirim detail campaign ke Genvibes.</h1>
            <p class="mt-5 max-w-2xl text-base leading-7 text-slate-600 md:text-lg md:leading-8">
                Ceritakan kebutuhan campaign, target audience, dan timeline yang kamu rencanakan. Tim Genvibes akan meninjau brief kamu dan membantu arahkan paket yang paling sesuai.
            </p>

            <a class="instagram-cta mt-7 flex items-center justify-between gap-4 rounded-[1.5rem] border-2 border-brand bg-white p-5 text-brand shadow-xl shadow-blue-950/10 transition hover:-translate-y-1 hover:bg-blue-50 hover:shadow-glow" href="http://instagram.com/genvibes.id" target="_blank" rel="noopener noreferrer">
                <span>
                    <span class="block text-xs font-black uppercase tracking-normal text-slate-500">Instagram</span>
                    <strong class="mt-1 block text-2xl font-black">@genvibes.id</strong>
                    <span class="mt-1 block break-all text-sm font-bold text-slate-500">instagram.com/genvibes.id</span>
                </span>
                <span class="grid h-12 w-12 shrink-0 place-items-center rounded-full bg-brand text-xl font-black text-white">IG</span>
            </a>
        </div>

        <form id="contactForm" class="contact-form rounded-[2rem] border border-blue-100 bg-white p-5 shadow-2xl shadow-blue-950/10 md:p-8">
            <div class="mb-6">
                <p class="text-sm font-black uppercase tracking-normal text-brand">Send Brief</p>
                <h2 class="mt-2 text-3xl font-black text-slate-950">Mulai dari sini.</h2>
            </div>

            <label class="contact-field">
                <span>Nama</span>
                <input id="contactName" name="name" type="text" placeholder="Nama lengkap" required>
            </label>

            <label class="contact-field">
                <span>Subject</span>
                <input id="contactSubject" name="subject" type="text" placeholder="Subject campaign" required>
            </label>

            <label class="contact-field">
                <span>Isi</span>
                <textarea id="contactMessage" name="message" rows="8" placeholder="Tulis kebutuhan campaign atau pertanyaan..." required></textarea>
            </label>

            <button class="mt-2 w-full rounded-full bg-brand px-8 py-4 font-black text-white shadow-xl shadow-blue-950/15 transition hover:-translate-y-0.5 hover:bg-brandDark" type="submit">Send Card</button>
        </form>
    </div>
</section>
