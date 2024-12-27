<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Exports\UsersExport;
use App\Filament\Resources\UserResource;
use App\Imports\UsersImport;
use App\Models\User;
use Filament\Actions\CreateAction;
use Filament\Actions\Action;
use Filament\Forms\Components\FileUpload;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Pages\ListRecords\Tab;
use Illuminate\Database\Eloquent\Collection;
use Maatwebsite\Excel\Facades\Excel;

class ListUsers extends ListRecords
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        // if (User::count()) {
        //     return [
        //        CreateAction::make(),
        //        Action::make('importUsers')->label('Import Users')->icon('heroicon-o-user-group')
        //             ->form([
        //                 FileUpload::make('attachment')->directory('xlsx')->preserveFilenames(),
        //             ])->color('danger')
        //             ->action(function (array $data) {
        //                 // $file = public_path('storage'.$data['attachment']);
        //                 $file = storage_path('app/public/' . $data['attachment']);
        //                 // dd($file, file_exists($file));
        //                 // dd($file);
        //                 Excel::import(new UsersImport, $file);
        //                 Notification::make()->title('Users Imported')->success()->send();
        //             }),
        //        Action::make('exportUsers')->label('Export Users')->icon('heroicon-o-document-arrow-down')
        //             ->action(function (Collection $records) {
        //                 return Excel::download(new UsersExport($records, 0), 'users.xlsx');
        //             }),
        //     ];
        // } else {
        //     return [
        //         CreateAction::make(),
        //         Action::make('importUsers')->label('Import Users')->icon('heroicon-o-user-group')
        //             ->form([
        //                 FileUpload::make('attachment')->directory('xlsx')->preserveFilenames(),
        //             ])->color('danger')
        //             ->action(function (array $data) {
        //                 $file = storage_path('app/public/' . $data['attachment']);
        //                 Excel::import(new UsersImport, $file);

        //                 Notification::make()->title('Users Imported')->success()->send();
        //             }),
        //     ];
        // }

        return [
            CreateAction::make(),
        ];
    }
}
