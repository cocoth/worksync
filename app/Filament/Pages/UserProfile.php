<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use App\Models\User;

class UserProfile extends Page
{
    protected static ?string $navigationLabel = 'Pengaturan Akun';
    protected static ?string $navigationIcon = 'heroicon-o-user';
    protected static string $view = 'filament.pages.user-profile';

    public $name;
    public $email;
    public $password;

    public function mount()
    {
        $this->name = Auth::user()->name;
        $this->email = Auth::user()->email;
    }

    public function save()
    {
        $user = Auth::user();

        if ($user instanceof User) { 
            $user->update([
                'name' => $this->name,
                'email' => $this->email,
                'password' => $this->password ? Hash::make($this->password) : $user->password,
            ]);
    
            $this->reset('password'); 
            session()->flash('success', 'Profil berhasil diperbarui!');
        } else {
            session()->flash('error', 'Gagal memperbarui profil.');
        }
    }
}
