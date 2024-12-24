<?php

namespace App\Filament\Widgets;

use App\Filament\Resources\KycResource;
use App\Filament\Resources\SubscriptionResource;
use App\Filament\Resources\UserResource;
use App\Models\Kyc;
use App\Models\Subscription;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected static ?int $sort = 1;
    protected function getStats(): array
    {
        return [
            Stat::make('This month users', User::query()->whereBetween('created_at', [now()->startOfMonth(), now()->endOfMonth()])->count())
                ->url(UserResource::getUrl('index'), true),
            Stat::make('Pending Verifications', Kyc::query()->where('approved', false)->count())
                ->url(KycResource::getUrl('index'), true)
                ->description('pending kyc verifications'),
            Stat::make('Active Subscriptions', Subscription::query()->where('end_date', '>', now())->count())
                ->url(SubscriptionResource::getUrl('index'), true)
        ];
    }
}
