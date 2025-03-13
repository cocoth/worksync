<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\Cuti;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\CutiResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\CutiResource\RelationManagers;

class CutiResource extends Resource
{
    protected static ?string $model = Cuti::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Select::make('karyawan_id')
                ->relationship('karyawan', 'nama')
                ->required(),
            DatePicker::make('tanggal_mulai')->required(),
            DatePicker::make('tanggal_selesai')->required(),
            Select::make('status')
                ->options([
                    'pending' => 'Pending',
                    'disetujui' => 'Disetujui',
                    'ditolak' => 'Ditolak',
                ])
                ->default('pending')
                ->required(),
            FileUpload::make('lampiran')
                ->directory('uploads/cuti')
                ->nullable(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('karyawan.nama')
                ->label('Nama Karyawan')
                ->sortable()
                ->searchable(),
            TextColumn::make('tanggal_mulai')->label('Tanggal Mulai')->date(),
            TextColumn::make('tanggal_selesai')->label('Tanggal Selesai')->date(),
            TextColumn::make('status')
                ->label('Status Cuti')
                ->badge()
                ->color(fn (string $state): string => match ($state) {
                    'disetujui' => 'success',
                    'ditolak'   => 'danger', 
                    'pending'   => 'warning',
                    default     => 'gray',
                }),
            TextColumn::make('lampiran')
                ->label('Dokumen')
                ->formatStateUsing(fn ($state) => $state ? "<a href='/storage/{$state}' target='_blank'><img src='/storage/{$state}' alt='Dokumen' style='max-width: 100px; max-height: 100px;'/></a>" : 'Tidak ada file')
                ->html(),
        ]);
    }

    public static function getRelations(): array
    {
        return [
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCutis::route('/'),
            'create' => Pages\CreateCuti::route('/create'),
            'edit' => Pages\EditCuti::route('/{record}/edit'),
        ];
    }
}
