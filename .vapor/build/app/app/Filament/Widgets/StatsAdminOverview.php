<?php

namespace App\Filament\Widgets;

use App\Models\Activity;
use App\Models\ActivityType;
use App\Models\College;
use App\Models\Department;
use App\Models\Faculty;
use App\Models\HoD;
use App\Models\Principal;
use App\Models\Program;
use App\Models\Student;
use App\Models\User;
use Filament\Support\Enums\IconPosition;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsAdminOverview extends BaseWidget
{
    protected static ?string $pollingInterval = '2s';
    protected static bool $isLazy = false;
    protected function getStats(): array
    {
        return [
            // Stat::make('User counts', User::count())
            //     ->description('Users of Mantan')
            //     ->descriptionIcon('heroicon-m-user', IconPosition::Before)
            //     ->color('success'),
            // Stat::make('Students', Student::count())
            //     ->description('Students registered in Mantan') 
            //     ->descriptionIcon('heroicon-m-academic-cap', IconPosition::Before)
            //     ->color('success'),
            // Stat::make('Faculties', Faculty::count())
            //     ->description('Faculties registered in Mantan')
            //     ->descriptionIcon('heroicon-m-users', IconPosition::Before)
            //     ->color('success'),
            // Stat::make('Hods', HoD::count())
            //     ->description('HoDs registered in Mantan')
            //     ->descriptionIcon('heroicon-m-user', IconPosition::Before)
            //     ->color('success'),
            // Stat::make('Principals', Principal::count())
            //     ->description('Principals registered in Mantan')
            //     ->descriptionIcon('heroicon-m-shield-exclamation', IconPosition::Before)
            //     ->color('success'),
            // Stat::make('Colleges', College::count())
            //     ->description('Colleges registered in Mantan')
            //     ->descriptionIcon('heroicon-m-building-office-2', IconPosition::Before)
            //     ->color('success'),
            // Stat::make('Departments', Department::count())
            //     ->description('Departments available in Mantan')
            //     ->descriptionIcon('heroicon-m-book-open', IconPosition::Before)
            //     ->color('success'),
            // Stat::make('Programs', Program::count())
            //     ->description('Programs available in Mantan')
            //     ->descriptionIcon('heroicon-m-swatch', IconPosition::Before)
            //     ->color('success'),
            // Stat::make('Activity', Activity::count())
            //     ->description('Activity available in Mantan')
            //     ->descriptionIcon('heroicon-m-chart-bar', IconPosition::Before)
            //     ->color('success'),
            // Stat::make('Activity Type', ActivityType::count())
            //     ->description('Activity Type available in Mantan')
            //     ->descriptionIcon('heroicon-m-rectangle-group', IconPosition::Before)
            //     ->color('success'),
        ];
    }
}