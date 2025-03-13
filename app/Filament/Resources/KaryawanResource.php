<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Karyawan;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\KaryawanResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\KaryawanResource\RelationManagers;

class KaryawanResource extends Resource
{
    protected static ?string $model = Karyawan::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('nama')->required(),
            TextInput::make('email')->email()->required()->unique(ignoreRecord: true),
            TextInput::make('jabatan')->required(),
            FileUpload::make('foto')
                ->label('Upload dokumen')
                ->directory('uploads/karyawan')
                ->nullable()
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('nama')->label('Nama Karyawan')->searchable(),
            TextColumn::make('email')->label('Email'),
            TextColumn::make('jabatan')->label('Jabatan'),
            TextColumn::make('foto')
                ->label('Dokumen')
                ->formatStateUsing(fn ($state) => $state ? "<a href='/storage/{$state}' target='_blank'><img src='/storage/{$state}' alt='Dokumen' style='max-width: 100px; max-height: 100px;'/></a>" : 'Tidak ada file')
                ->html(),
        ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListKaryawans::route('/'),
            'create' => Pages\CreateKaryawan::route('/create'),
            'edit' => Pages\EditKaryawan::route('/{record}/edit'),
        ];
    }
}
