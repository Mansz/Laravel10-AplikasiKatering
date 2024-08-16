<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MenuResource\Pages;
use App\Models\Menu;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class MenuResource extends Resource
{
    protected static ?string $model = Menu::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Data Menu';
    protected static ?string $navigationGroup = 'Katering';
    protected static ?string $pluralLabel = 'Data Menu';
    protected static ?string $singularLabel = 'Data Menu';
    protected static ?string $label = 'Data Menu';
    protected static ?string $recordTitleAttribute = 'nama_menu';
    protected static ?string $recordLabelAttribute = 'nama_menu';
    protected static ?string $recordIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $recordLabel = 'Data Menu';
    protected static ?string $recordUrl = 'Menu';
    protected static ?string $recordRoute = 'filament.resource.menu.edit';
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
                Forms\Components\Select::make('merchant_id')
                    ->relationship('merchant', 'name') // Adjust if you have a Merchant model
                    ->nullable(),
                Forms\Components\TextInput::make('name')
                    ->required(),
                Forms\Components\Textarea::make('description')
                    ->required(),
                Forms\Components\TextInput::make('price')
                    ->required()
                    ->numeric()
                    ->minValue(0),
                Forms\Components\FileUpload::make('photo')
                    ->nullable()
                    ->disk('public') // Adjust disk as needed
                    ->directory('photos'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->sortable(),
                Tables\Columns\TextColumn::make('name')->sortable(),
                Tables\Columns\TextColumn::make('description')->limit(50),
                Tables\Columns\TextColumn::make('price')->sortable()->money('IDR'), // Adjust currency as needed
                Tables\Columns\ImageColumn::make('photo')
                    ->url(fn ($record) => $record->photo ? asset('storage/' . $record->photo) : null),
                Tables\Columns\TextColumn::make('created_at')->dateTime(),
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
            // Define any relationships here if necessary
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMenus::route('/'),
            'create' => Pages\CreateMenu::route('/create'),
            'edit' => Pages\EditMenu::route('/{record}/edit'),
        ];
    }
}