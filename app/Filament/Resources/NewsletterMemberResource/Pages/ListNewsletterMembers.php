<?php

namespace App\Filament\Resources\NewsletterMemberResource\Pages;

use App\Filament\Resources\NewsletterMemberResource;
use App\Models\NewsletterMember;
use Filament\Actions;
use Filament\Forms\Components\Textarea;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ListRecords;

class ListNewsletterMembers extends ListRecords
{
    protected static string $resource = NewsletterMemberResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            Actions\Action::make('bulkImport')
                ->label('Bulk Import')
                ->icon('heroicon-o-arrow-up-tray')
                ->form([
                    Textarea::make('emails')
                        ->label('Email Addresses')
                        ->helperText('One email per line, or separated by commas.')
                        ->required()
                        ->rows(8),
                ])
                ->action(function (array $data): void {
                    $raw = preg_split('/[\s,]+/', $data['emails'], -1, PREG_SPLIT_NO_EMPTY);
                    $imported = 0;

                    foreach ($raw as $email) {
                        $email = trim($email);
                        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                            NewsletterMember::firstOrCreate(
                                ['email' => $email],
                                ['code' => md5($email . now()), 'active' => false],
                            );
                            $imported++;
                        }
                    }

                    Notification::make()
                        ->title("{$imported} email(s) imported.")
                        ->success()
                        ->send();
                }),
        ];
    }
}
