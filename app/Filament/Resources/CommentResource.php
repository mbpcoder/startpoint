<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CommentResource\Pages;
use App\Models\Comment;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class CommentResource extends Resource
{
    protected static ?string $model = Comment::class;
    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-left-right';
    protected static ?string $navigationGroup = 'Content';
    protected static ?int $navigationSort = 3;

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->sortable(),
                Tables\Columns\TextColumn::make('author_name')->label('Author')->searchable(),
                Tables\Columns\TextColumn::make('email')->searchable(),
                Tables\Columns\TextColumn::make('post.title')->label('Post')->limit(40),
                Tables\Columns\TextColumn::make('body')->limit(60),
                Tables\Columns\IconColumn::make('approved')->boolean(),
                Tables\Columns\TextColumn::make('created_at')->dateTime()->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                Tables\Filters\TernaryFilter::make('approved'),
            ])
            ->actions([
                Tables\Actions\Action::make('toggleApproved')
                    ->label(fn(Comment $record): string => $record->approved ? 'Reject' : 'Approve')
                    ->icon(fn(Comment $record): string => $record->approved ? 'heroicon-o-x-circle' : 'heroicon-o-check-circle')
                    ->color(fn(Comment $record): string => $record->approved ? 'danger' : 'success')
                    ->action(fn(Comment $record) => $record->update(['approved' => ! $record->approved])),
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
            'index' => Pages\ListComments::route('/'),
        ];
    }
}
