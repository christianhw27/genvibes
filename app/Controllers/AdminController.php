<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Package;

class AdminController extends Controller
{
    private Package $packages;

    public function __construct()
    {
        $this->packages = new Package();
    }

    public function login(): void
    {
        if (is_admin()) {
            $this->redirect('/admin');
        }

        $this->view('admin/login', [
            'title' => 'Login Admin',
            'error' => flash('error'),
        ]);
    }

    public function authenticate(): void
    {
        $config = require ROOT_PATH . '/config/app.php';
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';

        if ($username === $config['admin_username'] && $password === $config['admin_password']) {
            $_SESSION['admin'] = $username;
            $this->redirect('/admin');
        }

        flash('error', 'Username atau password admin tidak sesuai.');
        $this->redirect('/admin/login');
    }

    public function logout(): void
    {
        unset($_SESSION['admin']);
        $this->redirect('/');
    }

    public function index(): void
    {
        $this->guard();

        $this->view('admin/index', [
            'title' => 'Dashboard Admin',
            'packages' => $this->packages->all(),
            'message' => flash('message'),
        ]);
    }

    public function create(): void
    {
        $this->guard();

        $this->view('admin/form', [
            'title' => 'Tambah Paket',
            'package' => $this->emptyPackage(),
            'action' => url('/admin/store'),
        ]);
    }

    public function store(): void
    {
        $this->guard();
        $this->packages->create($this->payload());
        flash('message', 'Paket berhasil ditambahkan.');
        $this->redirect('/admin');
    }

    public function edit(int $id): void
    {
        $this->guard();
        $package = $this->packages->find($id);

        if (!$package) {
            flash('message', 'Paket tidak ditemukan.');
            $this->redirect('/admin');
        }

        $this->view('admin/form', [
            'title' => 'Edit Paket',
            'package' => $package,
            'action' => url('/admin/update/' . $id),
        ]);
    }

    public function update(int $id): void
    {
        $this->guard();
        $this->packages->update($id, $this->payload());
        flash('message', 'Paket berhasil diperbarui.');
        $this->redirect('/admin');
    }

    public function delete(int $id): void
    {
        $this->guard();
        $this->packages->delete($id);
        flash('message', 'Paket berhasil dihapus.');
        $this->redirect('/admin');
    }

    private function guard(): void
    {
        if (!is_admin()) {
            $this->redirect('/admin/login');
        }
    }

    private function payload(): array
    {
        $titles = ['Social Media Management', 'Discount Package', 'Campus & Community Activation', 'KOL System'];
        $features = [];

        foreach ($titles as $index => $title) {
            $features[] = [
                'title' => $title,
                'included' => isset($_POST['features'][$index]['included']),
                'description' => trim($_POST['features'][$index]['description'] ?? ''),
                'kpi' => trim($_POST['features'][$index]['kpi'] ?? ''),
            ];
        }

        return [
            'name' => trim($_POST['name'] ?? ''),
            'price' => trim($_POST['price'] ?? ''),
            'duration' => trim($_POST['duration'] ?? ''),
            'summary' => trim($_POST['summary'] ?? ''),
            'features' => $features,
        ];
    }

    private function emptyPackage(): array
    {
        return [
            'name' => '',
            'price' => '',
            'duration' => '',
            'summary' => '',
            'features' => [
                ['title' => 'Social Media Management', 'included' => false, 'description' => '', 'kpi' => ''],
                ['title' => 'Discount Package', 'included' => false, 'description' => '', 'kpi' => ''],
                ['title' => 'Campus & Community Activation', 'included' => false, 'description' => '', 'kpi' => ''],
                ['title' => 'KOL System', 'included' => false, 'description' => '', 'kpi' => ''],
            ],
        ];
    }
}
