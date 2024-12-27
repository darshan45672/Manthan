<?php

namespace App\Filament\Resources;

use App\Filament\Exports\TestimonialsExporter;
use App\Filament\Resources\TestimonialsResource\Pages;
use App\Filament\Resources\TestimonialsResource\RelationManagers;
use App\Models\Testimonials;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ToggleButtons;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ExportAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TestimonialsResource extends Resource
{
    protected static ?string $model = Testimonials::class;

    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-left';

    protected static ?string $navigationLabel = 'User Testimonial';

    protected static ?string $navigationGroup = 'Settings';

    protected static ?string $navigationBadgeTooltip = 'The number of Testimonials';
    protected static ?string $slug = 'user-testimonials';
    protected static ?string $modelLabel = 'Testimonial';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('User Testimonial Information')->schema([
                    Select::make('user_id')->relationship('user', 'name')->label('User')->required()
                    ->searchable()->preload(),
                    TextInput::make('title')->label('Title')->placeholder('Testimonial Title')->required(),
                    ToggleButtons::make('is_published')->label('Published')->boolean()->grouped()->default('0')->required(),
                    Textarea::make('testimonial')->label('Testimonial')->placeholder('Testinomial Goes here')->required()
                    ->columnSpanFull()->rows(5),
                ])->collapsible()->columns(3),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.name')->label('User')->searchable()->sortable(),
                TextColumn::make('title')->label('Title')->searchable()->sortable(),
                TextColumn::make('testimonial')->label('Testimonial')->searchable()->sortable(),
                IconColumn::make('is_published')->label('Published')->searchable()->sortable()->boolean(),
            ])
            ->filters([
                //
            ])
            ->actions([
                ViewAction::make(),
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->headerActions([
                ExportAction::make()->exporter(TestimonialsExporter::class),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
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
            'index' => Pages\ListTestimonials::route('/'),
            'create' => Pages\CreateTestimonials::route('/create'),
            'edit' => Pages\EditTestimonials::route('/{record}/edit'),
        ];
    }
}
