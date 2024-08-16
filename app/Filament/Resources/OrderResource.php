<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Models\Order;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Data Order';
    protected static ?string $navigationGroup = 'Katering';
    protected static ?string $pluralLabel = 'Data Order';
    protected static ?string $singularLabel = 'Data Order';
    protected static ?string $label = 'Data Order';
    protected static ?string $recordTitleAttribute = 'nama_Order';
    protected static ?string $recordLabelAttribute = 'nama_Order';
    protected static ?string $recordIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $recordLabel = 'Data Order';
    protected static ?string $recordUrl = 'Order';
    protected static ?string $recordRoute = 'filament.resource.order.edit';
    protected static ?string $recordIconColor = 'text-blue-500';
    protected static ?string $recordIconSize = 'text-2xl';
    protected static ?string $recordIconClass = 'mr-2';
    protected static ?string $recordLabelClass = 'text-lg';
    protected static ?string $recordLabelColor = 'text-blue-500';
    protected static ?string $recordLabelSize = 'text-2xl';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('menu_id')
                    ->relationship('menu', 'name')
                    ->required(),
                Forms\Components\TextInput::make('quantity')
                    ->numeric()
                    ->required(),
                Forms\Components\DatePicker::make('delivery_date')
                    ->required(),
                Forms\Components\TextInput::make('customer_email')
                    ->email() // Pastikan untuk menambahkan email pelanggan
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('menu.name'),
                Tables\Columns\TextColumn::make('quantity'),
                Tables\Columns\TextColumn::make('delivery_date')
                    ->date(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
            ])
            ->filters([
                // Tambahkan filter jika diperlukan
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            // Tambahkan relasi jika diperlukan
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrder::route('/create'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }
}