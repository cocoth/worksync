<x-filament::page>
    <div class="max-w-2xl mx-auto bg-white dark:bg-gray-900 shadow-md rounded-lg p-6">
        <h2 class="text-2xl font-semibold text-gray-800 dark:text-white mb-4">Pengaturan Akun</h2>

        @if (session()->has('success'))
            <div class="mb-4 p-3 bg-green-100 dark:bg-green-800 text-green-700 dark:text-green-300 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        <form wire:submit.prevent="save" class="space-y-4">
            <!-- Nama -->
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nama</label>
                <input type="text" id="name" wire:model="name"
                    class="mt-1 block w-full px-4 py-2 bg-gray-100 dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-md focus:ring-blue-500 focus:border-blue-500 dark:focus:ring-blue-400 dark:focus:border-blue-400 text-gray-900 dark:text-white">
            </div>

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
                <input type="email" id="email" wire:model="email"
                    class="mt-1 block w-full px-4 py-2 bg-gray-100 dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-md focus:ring-blue-500 focus:border-blue-500 dark:focus:ring-blue-400 dark:focus:border-blue-400 text-gray-900 dark:text-white">
            </div>

            <!-- Password Baru -->
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Password Baru</label>
                <input type="password" id="password" wire:model="password"
                    class="mt-1 block w-full px-4 py-2 bg-gray-100 dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-md focus:ring-blue-500 focus:border-blue-500 dark:focus:ring-blue-400 dark:focus:border-blue-400 text-gray-900 dark:text-white"
                    placeholder="Biarkan kosong jika tidak ingin mengganti">
            </div>

            <!-- Tombol Simpan -->
            <x-filament::button type="submit" color="primary">
                Simpan Perubahan
            </x-filament::button>
        </form>
    </div>
</x-filament::page>
