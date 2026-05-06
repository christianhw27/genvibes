<?php
$featureNames = ['Social Media Management', 'Discount Package', 'Campus & Community Activation', 'KOL System'];
?>

<section class="relative isolate overflow-hidden bg-brand text-white">
    <div class="absolute inset-0 hero-mesh"></div>
    <div class="absolute inset-0 premium-grid opacity-60"></div>

    <div class="relative mx-auto flex min-h-screen max-w-7xl flex-col justify-center gap-10 px-5 py-12 md:px-10 md:py-16 lg:gap-12 lg:py-20">
        <div class="flex items-center justify-center">
            <div class="rounded-2xl bg-white px-6 py-3.5 shadow-xl shadow-blue-950/20 md:rounded-[1.5rem] md:px-8 md:py-5">
                <img class="h-10 w-auto object-contain sm:h-12 md:h-14" src="<?= asset('genvibes-logo.jpg') ?>" alt="Genvibes">
            </div>
        </div>

        <div class="mx-auto max-w-5xl text-center">
            <p class="mb-4 text-xs font-black uppercase tracking-normal text-blue-100 md:mb-5 md:text-sm">Campaign Partnership Proposal</p>
            <h1 class="text-4xl font-black leading-[1.05] tracking-normal sm:text-5xl md:text-6xl lg:text-8xl">
                Strategic marketing package.
            </h1>
            <p class="mx-auto mt-6 max-w-3xl text-base leading-7 text-white/80 md:mt-8 md:text-xl md:leading-8">
                Katalog paket social media management, promo diskon, aktivasi kampus, dan KOL yang dirancang untuk presentasi campaign yang lebih jelas, premium, dan mudah dibandingkan.
            </p>
            <div class="mt-8 grid gap-3 sm:flex sm:flex-wrap sm:items-center sm:justify-center sm:gap-4 md:mt-10">
                <a class="rounded-full bg-white px-8 py-4 text-center font-black text-brand shadow-2xl shadow-blue-950/25 transition hover:-translate-y-0.5" href="#packages">Lihat Paket</a>
                <a class="rounded-full border border-white/30 bg-white/12 px-8 py-4 text-center font-black text-white shadow-2xl shadow-blue-950/15 backdrop-blur transition hover:-translate-y-0.5 hover:bg-white/18" href="<?= url('/contact') ?>">Contact Us</a>
            </div>
            
            <div class="mt-10 flex items-center justify-center">
                <div class="inline-flex items-center gap-3 rounded-full border border-white/20 bg-white/10 py-2 pl-2 pr-5 text-sm font-semibold text-white backdrop-blur-md shadow-xl shadow-blue-950/10">
                    <span class="flex h-8 w-8 items-center justify-center rounded-full bg-white text-brand shadow-md"><?= count($packages) ?></span>
                    <span>Pilihan Paket Marketing</span>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="packages" class="relative overflow-hidden bg-slate-50 px-5 py-16 md:px-10">
    <div class="absolute inset-0 soft-mesh"></div>
    <div class="absolute inset-0 bg-grid-slate"></div>
    <div class="relative mx-auto max-w-7xl">
        <div class="mb-8 flex flex-col justify-between gap-5 md:flex-row md:items-end">
            <div>
                <p class="text-sm font-black uppercase tracking-normal text-brand">Main Program</p>
                <h2 class="mt-2 text-4xl font-black tracking-normal text-slate-950 md:text-5xl">Bandingkan Paket</h2>
            </div>
            <div class="flex w-full flex-col gap-3 rounded-3xl border border-blue-100 bg-white p-3 shadow-xl shadow-blue-950/5 md:w-auto md:flex-row">
                <input id="catalogSearch" class="min-h-12 rounded-2xl border border-slate-200 px-4 outline-none focus:border-brand md:w-72" type="search" placeholder="Cari paket atau fitur...">
                <select id="featureFilter" class="min-h-12 rounded-2xl border border-slate-200 px-4 outline-none focus:border-brand">
                    <option value="">Semua fitur</option>
                    <?php foreach ($featureNames as $featureName): ?>
                        <option value="<?= e($featureName) ?>"><?= e($featureName) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>

        <div class="grid gap-6 lg:grid-cols-2">
            <?php foreach ($packages as $index => $package): ?>
                <?php
                $includedFeatures = array_values(array_filter($package['features'], fn ($feature) => $feature['included']));
                $featureText = strtolower($package['name'] . ' ' . $package['summary'] . ' ' . implode(' ', array_column($package['features'], 'title')));
                ?>
                <article class="catalog-card group relative overflow-hidden rounded-[2rem] border border-blue-100 bg-white p-6 shadow-xl shadow-blue-950/5 transition duration-300 hover:-translate-y-1 hover:shadow-glow" data-search="<?= e($featureText) ?>" data-features="<?= e(implode('|', array_column($includedFeatures, 'title'))) ?>">
                    <div class="absolute -right-14 -top-14 h-36 w-36 rounded-full bg-blue-100 transition group-hover:scale-125"></div>
                    <div class="relative">
                        <div class="mb-5 flex flex-col gap-4 sm:flex-row sm:items-start sm:justify-between">
                            <div>
                                <p class="text-sm font-black uppercase tracking-normal text-brand"><?= e($package['duration']) ?></p>
                                <h3 class="mt-2 text-3xl font-black text-slate-950"><?= e($package['name']) ?></h3>
                                <p class="mt-3 max-w-xl text-slate-600"><?= e($package['summary']) ?></p>
                            </div>
                            <?php if ($index === count($packages) - 1): ?>
                                <span class="shrink-0 self-start rounded-full bg-brand px-4 py-2 text-xs font-black uppercase tracking-normal text-white shadow-lg shadow-blue-900/20">Best Value</span>
                            <?php endif; ?>
                        </div>

                        <div class="mb-6 flex flex-wrap items-end gap-3">
                            <strong class="text-5xl font-black tracking-normal text-brand"><?= e($package['price']) ?></strong>
                            <span class="pb-2 text-sm font-bold text-slate-500">/ campaign</span>
                        </div>

                        <div class="grid gap-3">
                            <?php foreach ($package['features'] as $feature): ?>
                                <div class="rounded-2xl border <?= $feature['included'] ? 'border-blue-100 bg-blue-50/60' : 'border-slate-100 bg-slate-50' ?> p-4">
                                    <div class="flex items-center gap-3">
                                        <span class="grid h-8 w-8 place-items-center rounded-full <?= $feature['included'] ? 'bg-brand text-white' : 'bg-slate-200 text-slate-500' ?> text-sm font-black"><?= $feature['included'] ? '&check;' : '-' ?></span>
                                        <b class="text-slate-950"><?= e($feature['title']) ?></b>
                                    </div>
                                    <?php if ($feature['included']): ?>
                                        <p class="mt-3 text-sm leading-6 text-slate-600"><?= e($feature['description']) ?></p>
                                        <p class="mt-3 rounded-xl bg-white p-3 text-sm font-semibold leading-6 text-slate-800"><?= e($feature['kpi']) ?></p>
                                    <?php else: ?>
                                        <p class="mt-3 text-sm text-slate-500">Tidak termasuk dalam paket ini.</p>
                                    <?php endif; ?>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
        <p id="emptyCatalog" class="mt-6 hidden rounded-3xl border border-dashed border-blue-200 bg-white p-10 text-center font-bold text-slate-500">Paket tidak ditemukan.</p>

        <div class="mt-10 rounded-[2rem] border border-blue-100 bg-white p-6 shadow-xl shadow-blue-950/5 md:flex md:items-center md:justify-between md:gap-6">
            <div>
                <p class="text-sm font-black uppercase tracking-normal text-brand">Contact Us</p>
                <h2 class="mt-2 text-3xl font-black text-slate-950">Siap diskusi campaign?</h2>
                <p class="mt-2 max-w-2xl text-slate-600">Kirim brief singkat agar tim Genvibes bisa bantu arahkan paket yang paling sesuai.</p>
            </div>
            <a class="mt-5 inline-flex rounded-full bg-brand px-7 py-4 font-black text-white shadow-xl shadow-blue-950/15 transition hover:-translate-y-0.5 md:mt-0" href="<?= url('/contact') ?>">Contact Us</a>
        </div>
    </div>
</section>
