<section class="min-h-[calc(100vh-76px)] bg-slate-50 px-5 py-10 md:px-10">
    <div class="mx-auto max-w-7xl">
        <div class="mb-8 rounded-[2rem] bg-brand p-8 text-white shadow-glow">
            <div class="flex flex-col justify-between gap-6 md:flex-row md:items-end">
                <div>
                    <p class="text-sm font-black uppercase tracking-normal text-white/70">Genvibes Dashboard</p>
                    <h1 class="mt-2 text-4xl font-black tracking-normal md:text-5xl">Kelola Katalog</h1>
                    <p class="mt-3 max-w-2xl text-white/75">Tambah, edit, atau hapus paket yang tampil di halaman katalog publik.</p>
                </div>
                <div class="flex flex-wrap gap-3">
                    <a class="inline-flex min-h-12 items-center justify-center rounded-2xl border border-white/20 bg-white/10 px-5 font-black text-white backdrop-blur transition hover:-translate-y-0.5 hover:bg-white/15" href="<?= url('/') ?>">Dashboard User</a>
                    <a class="inline-flex min-h-12 items-center justify-center rounded-2xl bg-white px-5 font-black text-brand shadow-xl shadow-blue-950/20 transition hover:-translate-y-0.5" href="<?= url('/admin/create') ?>">Tambah Paket</a>
                </div>
            </div>
        </div>

        <?php if ($message): ?>
            <div class="mb-6 rounded-2xl border border-emerald-100 bg-emerald-50 p-4 font-bold text-emerald-700"><?= e($message) ?></div>
        <?php endif; ?>

        <div class="overflow-hidden rounded-[2rem] border border-blue-100 bg-white shadow-xl shadow-blue-950/5">
            <div class="overflow-x-auto">
                <table class="w-full border-collapse text-left">
                    <thead>
                        <tr class="bg-slate-950 text-sm uppercase tracking-normal text-white">
                            <th class="px-5 py-4">Paket</th>
                            <th class="px-5 py-4">Durasi</th>
                            <th class="px-5 py-4">Harga</th>
                            <th class="px-5 py-4">Fitur Aktif</th>
                            <th class="px-5 py-4">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        <?php foreach ($packages as $package): ?>
                            <tr class="transition hover:bg-blue-50/50">
                                <td class="px-5 py-5">
                                    <b class="block text-lg text-slate-950"><?= e($package['name']) ?></b>
                                    <span class="mt-1 block max-w-xl text-sm leading-6 text-slate-500"><?= e($package['summary']) ?></span>
                                </td>
                                <td class="px-5 py-5 font-bold text-slate-700"><?= e($package['duration']) ?></td>
                                <td class="px-5 py-5 text-xl font-black text-brand"><?= e($package['price']) ?></td>
                                <td class="px-5 py-5">
                                    <span class="rounded-full bg-blue-50 px-3 py-2 text-sm font-black text-brand"><?= count(array_filter($package['features'], fn ($feature) => $feature['included'])) ?> / 4</span>
                                </td>
                                <td class="px-5 py-5">
                                    <div class="flex flex-wrap gap-2">
                                        <a class="inline-flex min-h-10 items-center rounded-xl border border-blue-100 px-4 text-sm font-black text-brand transition hover:border-brand" href="<?= url('/admin/edit/' . $package['id']) ?>">Edit</a>
                                        <form action="<?= url('/admin/delete/' . $package['id']) ?>" method="post" onsubmit="return confirm('Hapus paket ini?')">
                                            <button class="min-h-10 rounded-xl bg-red-600 px-4 text-sm font-black text-white transition hover:bg-red-700" type="submit">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
