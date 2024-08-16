<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MerchantResource\Pages;
use App\Filament\Resources\MerchantResource\RelationManagers;
use App\Models\Merchant;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MerchantResource extends Resource
{
    protected static ?string $model = Merchant::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Data Merchant';
    protected static ?string $navigationGroup = 'Katering';
    protected static ?string $pluralLabel = 'Data Merchant';
    protected static ?string $singularLabel = 'Data Merchant';
    protected static ?string $label = 'Data Merchant';
    protected static ?string $recordTitleAttribute = 'nama_merchant';
    protected static ?string $recordLabelAttribute = 'nama_merchant';
    protected static ?string $recordIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $recordLabel = 'Data Merchant';
    protected static ?string $recordUrl = 'Merchant';
    protected static ?string $recordRoute = 'filament.resource.merchant.edit';
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
                Forms\Components\TextInput::make('name')
                    ->required(),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required(),
                Forms\Components\TextInput::make('password')
                    ->password()
                    ->required(),
                Forms\Components\TextInput::make('address')
                    ->required(),
                Forms\Components\TextInput::make('contact')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('email'),
                Tables\Columns\TextColumn::make('address'),
                Tables\Columns\TextColumn::make('contact'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
            ])
            ->filters([
                //
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMerchants::route('/'),
            'create' => Pages\CreateMerchant::route('/create'),
            'edit' => Pages\EditMerchant::route('/{record}/edit'),
        ];
    }
}
