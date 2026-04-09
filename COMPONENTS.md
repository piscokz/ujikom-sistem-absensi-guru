# Komponen UI Absensi Guru

Library komponen UI yang konsisten untuk aplikasi Absensi Guru, dibangun dengan Laravel Blade, Tailwind CSS, dan Alpine.js.

## Komponen Layout

### Layout Utama
```blade
<x-layout title="Judul Halaman">
    <x-sidebar>
        <!-- Konten sidebar -->
    </x-sidebar>

    <!-- Konten utama -->
</x-layout>
```

### Sidebar
```blade
<x-sidebar>
    <x-sidebar-group title="Menu Utama">
        <x-sidebar-item href="{{ route('dashboard') }}" :active="true" icon="home">
            Dashboard
        </x-sidebar-item>
    </x-sidebar-group>
</x-sidebar>
```

### Page Header
```blade
<x-page-header title="Judul Halaman" description="Deskripsi halaman">
    <x-slot name="actions">
        <x-button-action href="#" variant="primary" icon="plus">
            Tambah Data
        </x-button-action>
    </x-slot>
</x-page-header>
```

## Komponen Data Display

### Statistics Card
```blade
<x-stats-card title="Total Guru" :value="App\Models\Guru::count()" icon="users" color="indigo" />
```

### Data Table (Desktop)
```blade
<x-data-table :items="$items">
    <x-slot name="headers">
        <x-data-table-header>Kolom 1</x-data-table-header>
        <x-data-table-header>Kolom 2</x-data-table-header>
    </x-slot>

    <x-slot name="row" :item="$item">
        <x-data-table-cell>{{ $item->field1 }}</x-data-table-cell>
        <x-data-table-cell>{{ $item->field2 }}</x-data-table-cell>
    </x-slot>
</x-data-table>
```

### Data Card (Mobile)
```blade
<x-data-card :items="$items">
    <x-slot name="item" :item="$item">
        <!-- Konten card -->
    </x-slot>

    <x-slot name="actions" :item="$item">
        <!-- Tombol aksi -->
    </x-slot>
</x-data-card>
```

## Komponen Form

### Form Section
```blade
<x-form-section title="Informasi Dasar">
    <!-- Input fields -->
</x-form-section>
```

### Button Action
```blade
<x-button-action href="{{ route('create') }}" variant="primary" icon="plus">
    Tambah Data
</x-button-action>
```

### Form Input
```blade
<x-form-input label="Nama" name="nama" :value="old('nama')" required />
```

### Form Select
```blade
<x-form-select label="Kategori" name="kategori" :options="$options" :value="old('kategori')" />
```

## Komponen Utility

### Alert
```blade
<x-alert type="success" :dismissible="true">
    Data berhasil disimpan!
</x-alert>
```

### Status Badge
```blade
<x-status-badge status="active" />
```

### Loading
```blade
<x-loading size="md" color="indigo" />
```

### Empty State
```blade
<x-empty-state title="Tidak ada data" description="Belum ada data yang tersedia." />
```

### Error State
```blade
<x-error-state title="Terjadi Kesalahan" message="Silakan coba lagi nanti." />
```

### Modal
```blade
<x-modal name="confirm-delete" :show="$showModal">
    <x-slot name="title">Konfirmasi Hapus</x-slot>

    <!-- Konten modal -->

    <x-slot name="footer">
        <x-button-action variant="secondary" x-on:click="$dispatch('close-modal', { name: 'confirm-delete' })">
            Batal
        </x-button-action>
        <x-button-action variant="danger" type="submit">
            Hapus
        </x-button-action>
    </x-slot>
</x-modal>
```

## Komponen Navigation

### Breadcrumb
```blade
<x-breadcrumb :items="[
    ['label' => 'Dashboard', 'href' => route('dashboard')],
    ['label' => 'Data Guru']
]" />
```

### Pagination
```blade
<x-pagination :paginator="$items" />
```

### Tabs
```blade
<x-tabs :tabs="[
    ['id' => 'tab1', 'label' => 'Tab 1', 'content' => 'Konten tab 1'],
    ['id' => 'tab2', 'label' => 'Tab 2', 'content' => 'Konten tab 2']
]" />
```

## Warna dan Tema

Semua komponen menggunakan skema warna slate yang konsisten:
- Primary: Indigo
- Success: Green
- Danger: Red
- Warning: Yellow
- Info: Blue

Dukungan dark mode penuh dengan class `dark:` dari Tailwind CSS.

## Responsive Design

Semua komponen dirancang mobile-first:
- Mobile: Card view dengan `<x-data-card>`
- Desktop: Table view dengan `<x-data-table>`
- Breakpoint: `lg:` (1024px+)

## Penggunaan

1. Import komponen di file Blade
2. Gunakan props yang tersedia untuk kustomisasi
3. Pastikan data dikirim dalam format yang benar
4. Gunakan slot untuk konten dinamis

## Contoh Implementasi Lengkap

Lihat `dashboard.blade.php` dan `guru/index.blade.php` untuk contoh implementasi lengkap.