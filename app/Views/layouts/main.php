<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= e($title ?? 'Katalog') ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: '#004aad',
                        brandDark: '#00347a'
                    },
                    boxShadow: {
                        glow: '0 28px 80px rgba(0, 74, 173, .28)'
                    }
                }
            }
        };
    </script>
    <link rel="stylesheet" href="<?= asset('style.css') ?>">
</head>
<body class="min-h-screen bg-white text-slate-900 antialiased">
    <main class="relative overflow-hidden">
        <?= $content ?>
    </main>
    <footer class="border-t border-blue-100 bg-white px-5 py-6 text-center text-xs font-bold text-slate-500 md:px-10">
        <div class="mx-auto max-w-7xl">
            &copy; 2026 GENVIBES. Unauthorized use or reproduction is strictly prohibited.
        </div>
    </footer>
    <script src="<?= asset('app.js') ?>"></script>
</body>
</html>
