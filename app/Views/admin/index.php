<section class="min-h-[calc(100vh-76px)] bg-slate-50 px-5 py-10 md:px-10">
    <div class="mx-auto max-w-7xl">
        <div class="mb-8 rounded-[2rem] bg-brand p-6 text-white shadow-glow md:p-8">
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
                <table class="w-full border-collapse text-left block md:table">
                    <thead class="hidden md:table-header-group">
                        <tr class="bg-slate-950 text-sm uppercase tracking-normal text-white">
                            <th class="px-5 py-4">Paket</th>
                            <th class="px-5 py-4">Durasi</th>
                            <th class="px-5 py-4">Harga</th>
                            <th class="px-5 py-4 text-center">Fitur Aktif</th>
                            <th class="px-5 py-4">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="block md:table-row-group divide-y divide-slate-100">
                        <?php foreach ($packages as $package): ?>
                            <tr class="block p-6 transition hover:bg-blue-50/50 md:table-row md:p-0">
                                <td class="block px-0 py-2 md:table-cell md:px-5 md:py-5">
                                    <b class="block text-xl text-slate-950 md:text-lg"><?= e($package['name']) ?></b>
                                    <span class="mt-1 block max-w-xl text-sm leading-6 text-slate-500"><?= e($package['summary']) ?></span>
                                </td>
                                <td class="mt-3 flex items-center justify-between px-0 py-2 font-bold text-slate-700 md:mt-0 md:table-cell md:px-5 md:py-5">
                                    <span class="text-xs font-black uppercase tracking-wider text-slate-400 md:hidden">Durasi</span>
                                    <span><?= e($package['duration']) ?></span>
                                </td>
                                <td class="flex items-center justify-between px-0 py-2 text-xl font-black text-brand md:table-cell md:px-5 md:py-5">
                                    <span class="text-xs font-black uppercase tracking-wider text-slate-400 md:hidden">Harga</span>
                                    <span><?= e($package['price']) ?></span>
                                </td>
                                <td class="flex items-center justify-between px-0 py-2 md:table-cell md:px-5 md:py-5 md:text-center">
                                    <span class="text-xs font-black uppercase tracking-wider text-slate-400 md:hidden">Fitur Aktif</span>
                                    <span class="inline-flex items-center justify-center rounded-full bg-blue-50 px-3 py-1.5 text-sm font-black text-brand"><?= count(array_filter($package['features'], fn ($feature) => $feature['included'])) ?> / 4</span>
                                </td>
                                <td class="mt-4 block border-t border-dashed border-slate-100 px-0 pt-4 pb-2 md:mt-0 md:table-cell md:border-0 md:px-5 md:py-5 md:pt-5">
                                    <div class="grid grid-cols-2 gap-3 md:flex md:flex-wrap md:gap-2">
                                        <a class="inline-flex min-h-12 w-full items-center justify-center rounded-xl border-2 border-blue-100 px-4 text-sm font-black text-brand transition hover:border-brand hover:bg-blue-50 md:min-h-10 md:w-auto md:border" href="<?= url('/admin/edit/' . $package['id']) ?>">Edit</a>
                                        <form class="w-full md:w-auto" action="<?= url('/admin/delete/' . $package['id']) ?>" method="post" onsubmit="return confirm('Hapus paket ini?')">
                                            <button class="inline-flex min-h-12 w-full items-center justify-center rounded-xl bg-red-600 px-4 text-sm font-black text-white transition hover:bg-red-700 md:min-h-10 md:w-auto" type="submit">Hapus</button>
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
