<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Models\Order;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-cart';
    protected static ?string $navigationGroup = 'Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Customer Information')
                    ->schema([
                        Forms\Components\Select::make('user_id')
                            ->relationship('user', 'name')
                            ->searchable()
                            ->preload()
                            ->required(),
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('phone')
                            ->required()
                            ->tel()
                            ->maxLength(20),
                        Forms\Components\Textarea::make('address')
                            ->required()
                            ->maxLength(65535)
                            ->columnSpanFull(),
                    ])->columns(2),

                Forms\Components\Section::make('Order Details')
                    ->schema([
                        Forms\Components\TextInput::make('total_amount')
                            ->required()
                            ->numeric()
                            ->prefix('Rp'),
                        Forms\Components\Select::make('payment_method')
                            ->required()
                            ->options([
                                'cod' => 'Cash on Delivery',
                                'bca' => 'Bank BCA',
                            ]),
                        Forms\Components\Select::make('payment_status')
                            ->required()
                            ->options([
                                'menunggu' => 'Menunggu',
                                'dibayar' => 'Dibayar',
                                'dikembalikan' => 'Dikembalikan',
                            ])
                            ->default('menunggu'),
                        Forms\Components\Select::make('status')
                            ->required()
                            ->options([
                                'diproses' => 'Diproses',
                                'diantar' => 'Diantar',
                                'diterima' => 'Diterima',
                                'dibatalkan' => 'Dibatalkan',
                            ])
                            ->default('diproses'),
                        Forms\Components\DateTimePicker::make('order_date')
                            ->required()
                            ->default(now()),
                        Forms\Components\FileUpload::make('payment_proof')
                            ->image()
                            ->directory('payment-proofs')
                            ->nullable(),
                    ])->columns(2),

                Forms\Components\Section::make('Order Items')
                    ->schema([
                        Forms\Components\Repeater::make('items')
                            ->relationship()
                            ->schema([
                                Forms\Components\TextInput::make('order_name')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('quantity')
                                    ->required()
                                    ->numeric()
                                    ->minValue(1),
                                Forms\Components\Textarea::make('order_note')
                                    ->maxLength(65535)
                                    ->nullable(),
                            ])
                            ->columns(2)
                            ->columnSpanFull(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->sortable()
                    ->searchable(),
                // Tables\Columns\TextColumn::make('user.name')
                //     ->sortable()
                //     ->searchable(),
                Tables\Columns\TextColumn::make('name')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone')
                    ->searchable(),
                Tables\Columns\TextColumn::make('total_amount')
                    ->money('IDR')
                    ->sortable(),
                Tables\Columns\TextColumn::make('payment_method')
                    ->sortable(),
                Tables\Columns\TextColumn::make('payment_status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'menunggu' => 'warning',
                        'dibayar' => 'success',
                        'dikembalikan' => 'danger',
                    }),
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'diproses' => 'warning',
                        'diantar' => 'info',
                        'diterima' => 'success',
                        'dibatalkan' => 'danger',
                    }),
                Tables\Columns\ImageColumn::make('payment_proof')
                    ->label('Payment Proof'),
                Tables\Columns\TextColumn::make('order_date')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrder::route('/create'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}