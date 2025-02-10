<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductsResource\Pages;
use App\Filament\Resources\ProductsResource\RelationManagers;
use App\Models\Products;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Filters\SelectFilter;

class ProductsResource extends Resource
{
    protected static ?string $model = Products::class;

    protected static ?string $navigationIcon = 'heroicon-o-tag';

    protected static ?string $navigationLabel = 'All Products';
    
    protected static ?string $navigationGroup = 'Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                FileUpload::make('product_image')
                ->required()
                ->label('Gambar'),
                TextInput::make('product_name')
                ->required()
                ->label('Nama Produk'),
                TextInput::make('price')
                ->required()
                ->label('Harga'),
                TextInput::make('stock')
                ->numeric()
                ->required()
                ->label('Stock'),
                RichEditor::make('description')
                ->label('Deskripsi'),
                Select::make('category')
                ->options([
                    'Mesin Jahit & Aksesoris' => 'Mesin Jahit & Aksesoris',
                    'Benang & Jarum' => 'Benang & Jarum',
                    'Kain & Material' => 'Kain & Material',
                    'Gunting & Pemotong' => 'Gunting & Pemotong',
                    'Alat Ukur & Pola' => 'Alat Ukur & Pola',
                    'Aksesoris Jahit' => 'Aksesoris Jahit',
                    'Alat Tulis & DIY' => 'Alat Tulis & DIY',
                    'Lem & Perekat' => 'Lem & Perekat'
                ])
                ->required()
                ->label('Pilih Kategori')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('product_image')
                ->square()
                ->label('Gambar')
                ->searchable(),
                TextColumn::make('product_name')
                ->label('Nama Produk')
                ->searchable(),
                TextColumn::make('price')
                ->label('Harga')
                ->searchable(),
                TextColumn::make('stock')
                ->label('Stock')
                ->searchable(),
                TextColumn::make('category')
                ->label('Kategori')
                ->searchable(),
            ])
            ->filters([
                SelectFilter::make('category')
                ->label('Filter Kategori')
                ->options([
                    'Mesin Jahit & Aksesoris' => 'Mesin Jahit & Aksesoris',
                    'Benang & Jarum' => 'Benang & Jarum',
                    'Kain & Material' => 'Kain & Material',
                    'Gunting & Pemotong' => 'Gunting & Pemotong',
                    'Alat Ukur & Pola' => 'Alat Ukur & Pola',
                    'Aksesoris Jahit' => 'Aksesoris Jahit',
                    'Alat Tulis & DIY' => 'Alat Tulis & DIY',
                    'Lem & Perekat' => 'Lem & Perekat'
                ])
                ->searchable(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                // Tables\Actions\ForceDeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
                ]),
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProducts::route('/create'),
            'edit' => Pages\EditProducts::route('/{record}/edit'),
        ];
    }
}
