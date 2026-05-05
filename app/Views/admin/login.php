<section class="relative min-h-[calc(100vh-76px)] overflow-hidden bg-slate-950 px-5 py-16 text-white">
    <div class="absolute inset-0 premium-grid opacity-25"></div>
    <div class="absolute left-1/2 top-10 h-80 w-80 -translate-x-1/2 rounded-full bg-brand/40 blur-3xl"></div>

    <div class="relative mx-auto grid max-w-5xl items-center gap-10 md:grid-cols-[1fr_430px]">
        <div class="hidden md:block">
            <p class="text-sm font-black uppercase tracking-normal text-blue-200">Genvibes Back Office</p>
            <h1 class="mt-4 text-6xl font-black leading-none tracking-normal">Kelola katalog tanpa ribet.</h1>
            <p class="mt-6 max-w-xl text-lg leading-8 text-white/70">Area ini hanya untuk mengatur paket, harga, durasi, dan detail layanan yang tampil di katalog publik.</p>
        </div>

        <form class="rounded-[2rem] border border-white/15 bg-white p-7 text-slate-950 shadow-glow" action="<?= url('/admin/login') ?>" method="post">
            <div class="mb-8">
                <div class="mb-5 grid h-14 w-14 place-items-center rounded-2xl bg-brand text-lg font-black text-white shadow-lg shadow-blue-900/20">GV</div>
                <p class="text-sm font-black uppercase tracking-normal text-brand">Secure Entry</p>
                <h2 class="mt-2 text-3xl font-black tracking-normal">Masuk Dashboard</h2>
                <p class="mt-2 text-sm text-slate-500">Gunakan akun admin untuk mengelola katalog.</p>
            </div>

            <?php if ($error): ?>
                <div class="mb-5 rounded-2xl border border-red-100 bg-red-50 p-4 text-sm font-bold text-red-700"><?= e($error) ?></div>
            <?php endif; ?>

            <label class="mb-4 block">
                <span class="mb-2 block text-sm font-black text-slate-700">Username</span>
                <input class="min-h-12 w-full rounded-2xl border border-slate-200 px-4 outline-none transition focus:border-brand focus:ring-4 focus:ring-blue-100" type="text" name="username" required autofocus>
            </label>
            <label class="mb-6 block">
                <span class="mb-2 block text-sm font-black text-slate-700">Password</span>
                <input class="min-h-12 w-full rounded-2xl border border-slate-200 px-4 outline-none transition focus:border-brand focus:ring-4 focus:ring-blue-100" type="password" name="password" required>
            </label>
            <button class="min-h-12 w-full rounded-2xl bg-brand px-5 font-black text-white shadow-lg shadow-blue-900/20 transition hover:-translate-y-0.5 hover:bg-brandDark" type="submit">Masuk</button>
        </form>
    </div>
</section>
