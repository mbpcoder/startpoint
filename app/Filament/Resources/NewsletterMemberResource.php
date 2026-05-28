<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NewsletterMemberResource\Pages;
use App\Models\NewsletterMember;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class NewsletterMemberResource extends Resource
{
    protected static ?string $model = NewsletterMember::class;
    protected static string|null|\BackedEnum $navigationIcon = 'heroicon-o-user-group';
    protected static string|null|\UnitEnum $navigationGroup = 'Management';
    protected static ?int $navigationSort = 3;

    public static function form(Form|\Filament\Schemas\Schema $form): \Filament\Schemas\Schema
    {
        return $form->schema([
            Forms\Components\TextInput::make('email')
                ->email()
                ->required()
                ->maxLength(128)
                ->unique(ignoreRecord: true),
            Forms\Components\Toggle::make('active')->default(false),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->sortable(),
                Tables\Columns\TextColumn::make('email')->searchable(),
                Tables\Columns\TextColumn::make('code')->label('کد')->limit(16)->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\IconColumn::make('active')->boolean(),
                Tables\Columns\TextColumn::make('created_at')->dateTime()->sortable(),
            ])
            ->filters([
                Tables\Filters\TernaryFilter::make('active'),
            ])
            ->actions([
                Tables\Actions\Action::make('toggleActive')
                    ->label(fn(NewsletterMember $record): string => $record->active ? 'Deactivate' : 'Activate')
                    ->icon(fn(NewsletterMember $record): string => $record->active ? 'heroicon-o-x-circle' : 'heroicon-o-check-circle')
                    ->color(fn(NewsletterMember $record): string => $record->active ? 'warning' : 'success')
                    ->action(fn(NewsletterMember $record) => $record->update(['active' => ! $record->active])),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListNewsletterMembers::route('/'),
            'create' => Pages\CreateNewsletterMember::route('/create'),
        ];
    }
}
