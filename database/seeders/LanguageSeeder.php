<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\TranslationLoader\LanguageLine;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LanguageLine::create(
            [
                'group' => 'translate',
                'key' => 'hello',
                'text' => ['en' => 'hello', 'id' => 'hai']
            ],
        );
        LanguageLine::create(
            [
                'group' => 'translate',
                'key' => 'companies',
                'text' => ['en' => 'Companies', 'id' => 'Perusahaan']
            ],
        );
        LanguageLine::create(
            [
                'group' => 'translate',
                'key' => 'employees',
                'text' => ['en' => 'Employees', 'id' => 'Karyawan']
            ],
        );
        LanguageLine::create(
            [
                'group' => 'translate',
                'key' => 'companies_page',
                'text' => ['en' => 'Companies Page', 'id' => 'Halaman Perusahaan']
            ],
        );
        LanguageLine::create(
            [
                'group' => 'translate',
                'key' => 'employees_page',
                'text' => ['en' => 'Employees Page', 'id' => 'Halaman Karyawan']
            ],
        );
        LanguageLine::create(
            [
                'group' => 'translate',
                'key' => 'add_company',
                'text' => ['en' => 'Add Company', 'id' => 'Tambah Perusahaan']
            ],
        );
        LanguageLine::create(
            [
                'group' => 'translate',
                'key' => 'add_employee',
                'text' => ['en' => 'Add Employee', 'id' => 'Tambah Karyawan']
            ],
        );
        LanguageLine::create(
            [
                'group' => 'translate',
                'key' => 'name',
                'text' => ['en' => 'Name', 'id' => 'Nama']
            ],
        );
        LanguageLine::create(
            [
                'group' => 'translate',
                'key' => 'website',
                'text' => ['en' => 'Website', 'id' => 'Situs']
            ],
        );
        LanguageLine::create(
            [
                'group' => 'translate',
                'key' => 'action',
                'text' => ['en' => 'Action', 'id' => 'Aksi']
            ],
        );
        LanguageLine::create(
            [
                'group' => 'translate',
                'key' => 'first_name',
                'text' => ['en' => 'First Name', 'id' => 'Nama Depan']
            ],
        );
        LanguageLine::create(
            [
                'group' => 'translate',
                'key' => 'last_name',
                'text' => ['en' => 'Last Name', 'id' => 'Nama Belakang']
            ],
        );
        LanguageLine::create(
            [
                'group' => 'translate',
                'key' => 'phone',
                'text' => ['en' => 'Phone', 'id' => 'No. Telp']
            ],
        );
        LanguageLine::create(
            [
                'group' => 'translate',
                'key' => 'search',
                'text' => ['en' => 'Search', 'id' => 'Pencarian']
            ],
        );
        LanguageLine::create(
            [
                'group' => 'translate',
                'key' => 'company',
                'text' => ['en' => 'Company', 'id' => 'Perusahaan']
            ],
        );
    }
}
