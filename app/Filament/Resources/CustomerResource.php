<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CustomerResource\Pages;
use App\Filament\Resources\CustomerResource\RelationManagers;
use App\Models\Customer;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CustomerResource extends Resource
{
    protected static ?string $model = Customer::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Data Pelanggan';
    protected static ?string $navigationGroup = 'Data Master';
    protected static ?string $pluralLabel = 'Data Pelanggan';
    protected static ?string $singularLabel = 'Data Pelanggan';
    protected static ?string $label = 'Data Pelanggan';
    protected static ?string $recordTitleAttribute = 'nama_pelanggan';
    protected static ?string $recordLabelAttribute = 'nama_pelanggan';
    protected static ?string $recordIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $recordLabel = 'Data Pelanggan';
    protected static ?string $recordUrl = 'Pelanggan';
    protected static ?string $recordRoute = 'filament.resource.customer.edit';
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
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('email'),
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
            'index' => Pages\ListCustomers::route('/'),
            'create' => Pages\CreateCustomer::route('/create'),
            'edit' => Pages\EditCustomer::route('/{record}/edit'),
        ];
    }
    
}
