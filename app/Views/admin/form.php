<section class="min-h-[calc(100vh-76px)] bg-slate-50 px-5 py-10 md:px-10">
    <div class="mx-auto max-w-6xl">
        <div class="mb-8 flex flex-col justify-between gap-5 md:flex-row md:items-end">
            <div>
                <p class="text-sm font-black uppercase tracking-normal text-brand">Form Paket</p>
                <h1 class="mt-2 text-4xl font-black tracking-normal text-slate-950"><?= e($title) ?></h1>
            </div>
            <a class="inline-flex min-h-12 items-center justify-center rounded-2xl border border-blue-100 bg-white px-5 font-black text-brand shadow-sm transition hover:border-brand" href="<?= url('/admin') ?>">Kembali</a>
        </div>

        <form class="rounded-[2rem] border border-blue-100 bg-white p-6 shadow-xl shadow-blue-950/5" action="<?= $action ?>" method="post">
            <div class="grid gap-5 md:grid-cols-2">
                <label class="block">
                    <span class="mb-2 block text-sm font-black text-slate-700">Nama Paket</span>
                    <input class="min-h-12 w-full rounded-2xl border border-slate-200 px-4 outline-none transition focus:border-brand focus:ring-4 focus:ring-blue-100" type="text" name="name" value="<?= e($package['name']) ?>" required>
                </label>
                <label class="block">
                    <span class="mb-2 block text-sm font-black text-slate-700">Harga</span>
                    <input class="min-h-12 w-full rounded-2xl border border-slate-200 px-4 outline-none transition focus:border-brand focus:ring-4 focus:ring-blue-100" type="text" name="price" value="<?= e($package['price']) ?>" required>
                </label>
                <label class="block">
                    <span class="mb-2 block text-sm font-black text-slate-700">Durasi</span>
                    <input class="min-h-12 w-full rounded-2xl border border-slate-200 px-4 outline-none transition focus:border-brand focus:ring-4 focus:ring-blue-100" type="text" name="duration" value="<?= e($package['duration']) ?>" required>
                </label>
                <label class="block md:col-span-2">
                    <span class="mb-2 block text-sm font-black text-slate-700">Ringkasan</span>
                    <textarea class="w-full rounded-2xl border border-slate-200 px-4 py-3 outline-none transition focus:border-brand focus:ring-4 focus:ring-blue-100" name="summary" rows="3" required><?= e($package['summary']) ?></textarea>
                </label>
            </div>

            <div class="my-8 border-t border-slate-100 pt-8">
                <h2 class="text-2xl font-black tracking-normal text-slate-950">Fitur Paket</h2>
                <div class="mt-5 grid gap-5 md:grid-cols-2">
                    <?php foreach ($package['features'] as $index => $feature): ?>
                        <fieldset class="rounded-3xl border border-blue-100 bg-slate-50 p-5">
                            <legend class="px-2 text-sm font-black uppercase tracking-normal text-brand"><?= e($feature['title']) ?></legend>
                            <label class="mb-4 flex items-center gap-3 font-bold text-slate-700">
                                <input class="h-5 w-5 rounded border-slate-300 text-brand" type="checkbox" name="features[<?= $index ?>][included]" <?= $feature['included'] ? 'checked' : '' ?>>
                                Termasuk dalam paket
                            </label>
                            <input type="hidden" name="features[<?= $index ?>][title]" value="<?= e($feature['title']) ?>">
                            <label class="mb-4 block">
                                <span class="mb-2 block text-sm font-black text-slate-700">Keterangan</span>
                                <textarea class="w-full rounded-2xl border border-slate-200 px-4 py-3 outline-none transition focus:border-brand focus:ring-4 focus:ring-blue-100" name="features[<?= $index ?>][description]" rows="3"><?= e($feature['description']) ?></textarea>
                            </label>
                            <label class="block">
                                <span class="mb-2 block text-sm font-black text-slate-700">KPI</span>
                                <textarea class="w-full rounded-2xl border border-slate-200 px-4 py-3 outline-none transition focus:border-brand focus:ring-4 focus:ring-blue-100" name="features[<?= $index ?>][kpi]" rows="3"><?= e($feature['kpi']) ?></textarea>
                            </label>
                        </fieldset>
                    <?php endforeach; ?>
                </div>
            </div>

            <button class="min-h-12 rounded-2xl bg-brand px-6 font-black text-white shadow-lg shadow-blue-900/20 transition hover:-translate-y-0.5 hover:bg-brandDark" type="submit">Simpan Paket</button>
        </form>
    </div>
</section>
