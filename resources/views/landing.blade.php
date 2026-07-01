<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>CalTrack.id | Monitoring Status Gizi Remaja</title>

    @vite(['resources/css/app.css'])

    {{-- Google Font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect"
          href="https://fonts.gstatic.com"
          crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap"
          rel="stylesheet">

    <style>

        body{

            font-family:'Poppins',sans-serif;

            scroll-behavior:smooth;

        }

        .hero-bg{

            background:linear-gradient(
                135deg,
                #E8F8F2 0%,
                #FFFFFF 40%,
                #EAF7FF 100%
            );

        }

    </style>

</head>

<body class="bg-white text-gray-800">

<!-- ===================================================== -->
<!-- NAVBAR -->
<!-- ===================================================== -->

<nav class="fixed top-0 w-full bg-white/90 backdrop-blur-lg shadow-sm z-50">

    <div class="max-w-7xl mx-auto">

        <div class="flex justify-between items-center h-20 px-6">

            <!-- Logo -->

            <a href="#home"
               class="flex items-center gap-3">

                <img
                    src="{{ asset('logo.png') }}" 
                    alt="CalTrack.id"
                    class="h-14 w-auto">

                <div>

                    <h1 class="font-bold text-2xl text-green-600">

                        CalTrack.id

                    </h1>

                    <p class="text-xs text-gray-500">

                        Healthy Teen Lifestyle

                    </p>

                </div>

            </a>

            <!-- Menu -->

            <div class="hidden md:flex items-center space-x-10">

                <a href="#home"
                   class="hover:text-green-600 transition">

                    Beranda

                </a>

                <a href="#tentang"
                   class="hover:text-green-600 transition">

                    Tentang

                </a>

                <a href="#fitur"
                   class="hover:text-green-600 transition">

                    Fitur

                </a>

                <a href="#edukasi"
                   class="hover:text-green-600 transition">

                    Edukasi

                </a>

            </div>

            <!-- Button -->

            <div class="hidden md:flex gap-3">

                <a href="{{ route('login') }}"

                    class="border-2 border-green-500
                    text-green-600
                    px-5
                    py-2
                    rounded-full
                    hover:bg-green-50">

                    Login

                </a>

                <a href="{{ route('register') }}"

                    class="bg-green-500
                    text-white
                    px-6
                    py-2
                    rounded-full
                    hover:bg-green-600">

                    Register

                </a>

            </div>

        </div>

    </div>

</nav>

<!-- HERO SECTION -->
<section id="home" class="bg-gradient-to-r from-green-50 to-blue-50">

    <div class="max-w-7xl mx-auto px-6 py-20">

        <div class="grid lg:grid-cols-2 gap-12 items-center">

            <!-- Kiri -->
            <div>

                <h1 class="text-5xl lg:text-6xl font-extrabold leading-tight text-gray-800">

                    Pantau
                    <span class="text-green-500">
                        Status Gizi
                    </span>

                    Remajamu Lebih Mudah.

                </h1>

                <p class="mt-8 text-lg text-gray-600 leading-9">

                    CalTrack.id merupakan sistem monitoring status gizi remaja
                    usia <strong>10–21 tahun</strong> berbasis web yang
                    menggunakan pendekatan
                    <strong>Antropometri WHO</strong>,
                    <strong>IMT Menurut Umur</strong>,
                    <strong>BMR</strong>,
                    dan
                    <strong>Total Energy Expenditure (TEE)</strong>.

                </p>

                <div class="mt-10 flex gap-4">

                    <a href="{{ route('register') }}"
                        class="px-8 py-4 bg-green-500 text-white rounded-xl hover:bg-green-600 transition">

                        Mulai Sekarang

                    </a>

                    <a href="#tentang"
                        class="px-8 py-4 border border-green-500 text-green-600 rounded-xl hover:bg-green-50 transition">

                        Pelajari

                    </a>

                </div>

            </div>

            <!-- Kanan -->
            <div class="flex justify-center">

                <img
                    src="{{ asset('hero.png') }}"
                    alt="CalTrack Hero"
                    class="w-full max-w-lg drop-shadow-2xl hover:scale-105 transition duration-500">

            </div>

        </div>

    </div>

</section>

<!-- ===================================================== -->
<!-- TENTANG -->
<!-- ===================================================== -->

<section
id="tentang"
class="py-24 bg-white">

<div class="max-w-7xl mx-auto px-8">

<div class="text-center">

<span

class="text-green-600
font-semibold">

TENTANG CALTRACK.ID

</span>

<h2

class="text-5xl
font-bold
mt-4">

Apa itu CalTrack?

</h2>

<p

class="max-w-4xl
mx-auto
mt-8
leading-9
text-lg
text-gray-600">

CalTrack.id merupakan sistem informasi berbasis web
yang dirancang khusus untuk membantu remaja usia
<b>10–21 tahun</b> dalam memantau status gizi,
menghitung kebutuhan energi harian,
serta mencatat konsumsi makanan setiap hari.

Sistem ini menggunakan pendekatan
<b>Indeks Massa Tubuh menurut Umur (IMT/U)</b>,
perhitungan <b>BMR</b>,
<b>Total Energy Expenditure (TEE)</b>,
dan rekomendasi kebutuhan gizi sesuai karakteristik remaja.

</p>

</div>

</div>

</section>

<!-- ===================================================== -->
<!-- MENGAPA CALTRACK -->
<!-- ===================================================== -->

<section class="py-24 bg-gradient-to-b from-green-50 to-white">

    <div class="max-w-7xl mx-auto px-8">

        <div class="text-center">

            <span class="text-green-600 font-semibold uppercase tracking-widest">
                Mengapa Memilih CalTrack?
            </span>

            <h2 class="text-5xl font-bold mt-4">
                Solusi Monitoring Gizi Remaja
            </h2>

            <p class="mt-6 text-lg text-gray-600 max-w-3xl mx-auto leading-8">

                CalTrack.id dirancang khusus untuk remaja usia 10–21 tahun
                menggunakan pendekatan antropometri WHO sehingga hasil
                penilaian status gizi lebih sesuai dibandingkan IMT dewasa.

            </p>

        </div>

        <div class="grid lg:grid-cols-4 md:grid-cols-2 gap-8 mt-16">

            <div class="bg-white rounded-3xl shadow-lg p-8 hover:-translate-y-2 transition duration-300">

                <div class="text-5xl mb-5">📏</div>

                <h3 class="font-bold text-xl mb-3">

                    IMT Remaja

                </h3>

                <p class="text-gray-600 leading-7">

                    Menggunakan standar WHO BMI-for-Age untuk remaja.

                </p>

            </div>

            <div class="bg-white rounded-3xl shadow-lg p-8 hover:-translate-y-2 transition duration-300">

                <div class="text-5xl mb-5">🔥</div>

                <h3 class="font-bold text-xl mb-3">

                    Hitung Energi

                </h3>

                <p class="text-gray-600 leading-7">

                    Menghitung kebutuhan energi harian menggunakan BMR dan TEE.

                </p>

            </div>

            <div class="bg-white rounded-3xl shadow-lg p-8 hover:-translate-y-2 transition duration-300">

                <div class="text-5xl mb-5">🥗</div>

                <h3 class="font-bold text-xl mb-3">

                    Monitoring Nutrisi

                </h3>

                <p class="text-gray-600 leading-7">

                    Pantau kalori, protein, lemak dan karbohidrat setiap hari.

                </p>

            </div>

            <div class="bg-white rounded-3xl shadow-lg p-8 hover:-translate-y-2 transition duration-300">

                <div class="text-5xl mb-5">❤️</div>

                <h3 class="font-bold text-xl mb-3">

                    Hidup Lebih Sehat

                </h3>

                <p class="text-gray-600 leading-7">

                    Membantu membangun kebiasaan hidup sehat sejak usia remaja.

                </p>

            </div>

        </div>

    </div>

</section>

<!-- ===================================================== -->
<!-- FITUR -->
<!-- ===================================================== -->

<section id="fitur" class="py-24">

<div class="max-w-7xl mx-auto px-8">

<div class="text-center">

<span class="text-green-600 font-semibold">

FITUR UTAMA

</span>

<h2 class="text-4xl font-bold mt-4">

Semua yang Dibutuhkan
Untuk Monitoring Gizi

</h2>

</div>

<div class="grid lg:grid-cols-3 gap-10 mt-16">

<div class="bg-white rounded-3xl shadow-lg p-8 border hover:shadow-2xl transition">

<div class="text-5xl mb-6">

👤

</div>

<h3 class="font-bold text-2xl">

Profil Remaja

</h3>

<p class="mt-4 text-gray-600 leading-8">

Mengisi umur,
jenis kelamin,
berat badan,
tinggi badan,
serta aktivitas harian.

</p>

</div>

<div class="bg-white rounded-3xl shadow-lg p-8 border hover:shadow-2xl transition">

<div class="text-5xl mb-6">

⚖️

</div>

<h3 class="font-bold text-2xl">

Hitung IMT

</h3>

<p class="mt-4 text-gray-600 leading-8">

Menggunakan rumus BMI dan interpretasi antropometri WHO remaja.

</p>

</div>

<div class="bg-white rounded-3xl shadow-lg p-8 border hover:shadow-2xl transition">

<div class="text-5xl mb-6">

🔥

</div>

<h3 class="font-bold text-2xl">

BMR & TEE

</h3>

<p class="mt-4 text-gray-600 leading-8">

Menghitung kebutuhan energi harian berdasarkan aktivitas fisik.

</p>

</div>

<div class="bg-white rounded-3xl shadow-lg p-8 border hover:shadow-2xl transition">

<div class="text-5xl mb-6">

🍛

</div>

<h3 class="font-bold text-2xl">

Food Log

</h3>

<p class="mt-4 text-gray-600 leading-8">

Mencatat makanan yang dikonsumsi setiap hari.

</p>

</div>

<div class="bg-white rounded-3xl shadow-lg p-8 border hover:shadow-2xl transition">

<div class="text-5xl mb-6">

📊

</div>

<h3 class="font-bold text-2xl">

Dashboard

</h3>

<p class="mt-4 text-gray-600 leading-8">

Melihat perkembangan status gizi dan nutrisi harian.

</p>

</div>

<div class="bg-white rounded-3xl shadow-lg p-8 border hover:shadow-2xl transition">

<div class="text-5xl mb-6">

🥦

</div>

<h3 class="font-bold text-2xl">

Rekomendasi Makanan

</h3>

<p class="mt-4 text-gray-600 leading-8">

Memberikan rekomendasi makanan sesuai kebutuhan gizi pengguna.

</p>

</div>

</div>

</div>

</section>

<!-- ===================================================== -->
<!-- CARA KERJA -->
<!-- ===================================================== -->

<section class="py-24 bg-green-50">

<div class="max-w-7xl mx-auto px-8">

<div class="text-center">

<span class="text-green-600 font-semibold">

CARA KERJA

</span>

<h2 class="text-5xl font-bold mt-4">

Mulai Hanya Dalam 4 Langkah

</h2>

</div>

<div class="grid lg:grid-cols-4 gap-10 mt-20 text-center">

<div>

<div class="w-24 h-24 bg-green-500 rounded-full text-white flex items-center justify-center mx-auto text-4xl font-bold">

1

</div>

<h3 class="mt-6 font-bold text-xl">

Daftar Akun

</h3>

<p class="mt-4 text-gray-600">

Membuat akun CalTrack.id.

</p>

</div>

<div>

<div class="w-24 h-24 bg-green-500 rounded-full text-white flex items-center justify-center mx-auto text-4xl font-bold">

2

</div>

<h3 class="mt-6 font-bold text-xl">

Isi Profil

</h3>

<p class="mt-4 text-gray-600">

Masukkan umur, tinggi badan dan berat badan.

</p>

</div>

<div>

<div class="w-24 h-24 bg-green-500 rounded-full text-white flex items-center justify-center mx-auto text-4xl font-bold">

3

</div>

<h3 class="mt-6 font-bold text-xl">

Catat Makanan

</h3>

<p class="mt-4 text-gray-600">

Input makanan yang dikonsumsi setiap hari.

</p>

</div>

<div>

<div class="w-24 h-24 bg-green-500 rounded-full text-white flex items-center justify-center mx-auto text-4xl font-bold">

4

</div>

<h3 class="mt-6 font-bold text-xl">

Pantau Dashboard

</h3>

<p class="mt-4 text-gray-600">

Lihat status gizi, kebutuhan energi, dan rekomendasi makanan.

</p>

</div>

</div>

</div>

</section>

<!-- ================= FITUR ================= -->

<section class="py-20 bg-white">

    <div class="max-w-7xl mx-auto px-6">

        <div class="text-center mb-16">

            <h2 class="text-4xl font-bold text-slate-800">

                Fitur Unggulan CalTrack.id

            </h2>

            <p class="text-slate-500 mt-4">

                Dirancang khusus untuk membantu remaja memantau status gizi setiap hari.

            </p>

        </div>

        <div class="grid md:grid-cols-3 gap-8">

            <!-- Card 1 -->

            <div class="bg-blue-50 rounded-3xl p-8 shadow hover:shadow-xl transition">

                <div class="text-5xl mb-5">

                    📊

                </div>

                <h3 class="text-2xl font-semibold mb-3">

                    Monitoring IMT

                </h3>

                <p class="text-gray-600 leading-relaxed">

                    Menghitung Indeks Massa Tubuh (IMT) berdasarkan data tinggi badan dan berat badan remaja.

                </p>

            </div>

            <!-- Card 2 -->

            <div class="bg-green-50 rounded-3xl p-8 shadow hover:shadow-xl transition">

                <div class="text-5xl mb-5">

                    🍎

                </div>

                <h3 class="text-2xl font-semibold mb-3">

                    Catatan Makanan

                </h3>

                <p class="text-gray-600 leading-relaxed">

                    Mencatat makanan yang dikonsumsi setiap hari beserta kandungan kalorinya.

                </p>

            </div>

            <!-- Card 3 -->

            <div class="bg-yellow-50 rounded-3xl p-8 shadow hover:shadow-xl transition">

                <div class="text-5xl mb-5">

                    🎯

                </div>

                <h3 class="text-2xl font-semibold mb-3">

                    Rekomendasi Gizi

                </h3>

                <p class="text-gray-600 leading-relaxed">

                    Memberikan rekomendasi makanan berdasarkan kebutuhan kalori, protein, karbohidrat, dan lemak.

                </p>

            </div>

        </div>

    </div>

</section>

<!-- ================= MANFAAT ================= -->

<section class="py-20 bg-slate-100">

    <div class="max-w-7xl mx-auto px-6">

        <div class="grid lg:grid-cols-2 gap-16 items-center">

            <div class="flex justify-center">

                <img
                    src="{{ asset('status-gizi.png') }}"
                    alt="Monitoring Status Gizi Remaja"
                    class="w-[520px] lg:w-[600px] hover:scale-105 transition duration-500">

            </div>

            <div class="order-1 lg:order-2">

                <h2 class="text-4xl font-bold text-slate-800 mb-8">
                    Mengapa Remaja Harus Memantau Status Gizi?
                </h2>

                <div class="space-y-6">

                    <div class="flex gap-4">

                        <div>

                            <h4 class="font-bold">

                                Mendukung Pertumbuhan

                            </h4>

                            <p class="text-gray-600">

                                Masa remaja merupakan periode pertumbuhan tercepat setelah bayi.

                            </p>

                        </div>

                    </div>

                    <div class="flex gap-4">

                        <div>

                            <h4 class="font-bold">

                                Mencegah Obesitas

                            </h4>

                            <p class="text-gray-600">

                                Status gizi yang baik dapat mengurangi risiko penyakit tidak menular.

                            </p>

                        </div>

                    </div>

                    <div class="flex gap-4">

                        <div>

                            <h4 class="font-bold">

                                Prestasi Belajar

                            </h4>

                            <p class="text-gray-600">

                                Asupan gizi yang cukup membantu meningkatkan konsentrasi dan daya ingat.

                            </p>

                        </div>

                    </div>

                    <div class="flex gap-4">

                        <div>

                            <h4 class="font-bold">

                                Lebih Aktif

                            </h4>

                            <p class="text-gray-600">

                                Tubuh yang sehat membuat aktivitas belajar maupun olahraga menjadi lebih optimal.

                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

<!-- ================= CARA PENGGUNAAN ================= -->

<section class="py-24 bg-gradient-to-b from-white to-green-50">

<div class="max-w-7xl mx-auto px-6">

<div class="text-center mb-20">

<span class="text-green-600 font-semibold uppercase">

Cara Menggunakan

</span>

<h2 class="text-5xl font-bold mt-3">

Mulai Hanya Dalam 4 Langkah

</h2>

<p class="text-gray-500 mt-5">

CalTrack dirancang sederhana sehingga mudah digunakan oleh remaja.

</p>

</div>

<div class="grid lg:grid-cols-4 gap-10">

<div class="text-center">

<div class="w-20 h-20 rounded-full bg-green-500 text-white flex items-center justify-center text-3xl mx-auto shadow-lg">

1️⃣

</div>

<h3 class="font-bold text-xl mt-6">

Buat Akun

</h3>

<p class="text-gray-600 mt-3">

Daftarkan akun menggunakan email.

</p>

</div>

<div class="text-center">

<div class="w-20 h-20 rounded-full bg-green-500 text-white flex items-center justify-center text-3xl mx-auto shadow-lg">

2️⃣

</div>

<h3 class="font-bold text-xl mt-6">

Isi Profil

</h3>

<p class="text-gray-600 mt-3">

Masukkan umur, tinggi badan, berat badan, jenis kelamin dan aktivitas.

</p>

</div>

<div class="text-center">

<div class="w-20 h-20 rounded-full bg-green-500 text-white flex items-center justify-center text-3xl mx-auto shadow-lg">

3️⃣

</div>

<h3 class="font-bold text-xl mt-6">

Input Makanan

</h3>

<p class="text-gray-600 mt-3">

Catat makanan yang dikonsumsi setiap hari.

</p>

</div>

<div class="text-center">

<div class="w-20 h-20 rounded-full bg-green-500 text-white flex items-center justify-center text-3xl mx-auto shadow-lg">

4️⃣

</div>

<h3 class="font-bold text-xl mt-6">

Lihat Dashboard

</h3>

<p class="text-gray-600 mt-3">

Pantau perkembangan status gizi dan rekomendasi makanan.

</p>

</div>

</div>

</div>

</section>


<!-- ================= CTA ================= -->

<section class="py-24 bg-gradient-to-r from-green-600 to-emerald-500 text-white">

<div class="max-w-5xl mx-auto text-center px-6">

<h2 class="text-5xl font-bold">

Yuk Mulai Pantau Status Gizimu!

</h2>

<p class="mt-8 text-xl">

Menjadi remaja sehat dimulai dari mengetahui kondisi tubuh sendiri.

Dengan CalTrack.id kamu bisa memantau status gizi setiap hari.

</p>

<div class="mt-12">

<a href="{{ route('register') }}"

class="bg-white text-green-600 px-10 py-5 rounded-full text-xl font-bold shadow-lg hover:scale-105 transition">

Daftar Sekarang

</a>

</div>

</div>

</section>

<!-- ================= FOOTER ================= -->

<footer class="bg-slate-900 text-gray-300 py-16">

<div class="max-w-7xl mx-auto px-6">

<div class="grid lg:grid-cols-3 gap-10">

<div>

<img src="{{ asset('logo.png') }}"

class="h-16 mb-5">

<p class="leading-8">

CalTrack.id merupakan website monitoring status gizi remaja usia 10–21 tahun yang menggunakan pendekatan antropometri WHO.

</p>

</div>

<div>

<h3 class="font-bold text-white text-xl mb-5">

Menu

</h3>

<ul class="space-y-3">

<li><a href="#tentang" class="hover:text-green-400">Tentang</a></li>

<li><a href="#fitur" class="hover:text-green-400">Fitur</a></li>

<li><a href="#imt" class="hover:text-green-400">IMT</a></li>

<li><a href="{{ route('login') }}" class="hover:text-green-400">Login</a></li>

<li><a href="{{ route('register') }}" class="hover:text-green-400">Register</a></li>

</ul>

</div>

<div>

<h3 class="font-bold text-white text-xl mb-5">

Referensi

</h3>

<p>

WHO Growth Reference 2007

</p>

<p>

CDC BMI for Age

</p>

<p>

Permenkes RI No.2 Tahun 2020

</p>

<p>

AKG Kemenkes Indonesia

</p>

</div>

</div>

<hr class="my-10 border-gray-700">

<div class="text-center">

<p>

© 2026 CalTrack.id

</p>

<p class="mt-3 text-gray-400">

Developed for Final Project (Proyek Informatika)

</p>

</div>

</div>

</footer>