<?php

namespace App\Filament\Resources\NewsletterMemberResource\Pages;

use App\Filament\Resources\NewsletterMemberResource;
use Filament\Resources\Pages\CreateRecord;

class CreateNewsletterMember extends CreateRecord
{
    protected static string $resource = NewsletterMemberResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['code'] = md5($data['email'] . now());
        return $data;
    }
}
