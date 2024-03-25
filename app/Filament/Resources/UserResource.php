<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Filament\Resources\Pages\Page;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?int $navigationSort = 1;
    protected static ?string $navigationGroup = 'Settings';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([Card::make()
                ->schema([
                    TextInput::make('username')
                        ->required()
                        ->maxLength(255),
                    TextInput::make('email')
                        ->email()
                        ->required()
                        ->maxLength(255),
                    DateTimePicker::make('email_verified_at'),
                    TextInput::make('password')
                        ->password()
                        ->required(fn (Page $livewire)=> $livewire instanceof CreateUser)
                        ->maxLength(255)
                        ->dehydrateStateUsing(fn (string $state): string => Hash::make($state))
                        ->dehydrated(fn (?string $state): bool => filled($state)),
                    Select::make('roles')
                        ->relationship(titleAttribute: 'name')
                        ->preload(),
                    Select::make('permissions')
                        ->multiple()
                        ->relationship(titleAttribute: 'name')
                        ->preload(),
                ])

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('username'),
                TextColumn::make('email'),
                TextColumn::make('email_verified_at')->dateTime(),
                TextColumn::make('created_at')->dateTime(),
                TextColumn::make('updated_at')->dateTime(),
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
