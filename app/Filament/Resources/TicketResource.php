<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TicketResource\Pages;
use App\Filament\Resources\TicketResource\RelationManagers;
use App\Models\Ticket;
use Filament\Forms;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\TextInputColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TicketResource extends Resource
{
    protected static ?string $model = Ticket::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->columns(1)
            ->schema([
                TextInput::make('title')
                    ->required(),
                Select::make('status')
                    ->options(self::$model::STATUS)
                    ->required()
                    ->in(self::$model::STATUS),
                
                Select::make('priority')
                    ->options(self::$model::PRIORITY)
                    ->required()
                    ->in(self::$model::PRIORITY),
                Checkbox::make('is_resolved'),
                Textarea::make('description'),
                Textarea::make('comment')
                    ->disabled(!auth()->user()->hasPermission('ticket_edit')),
                Select::make('assigned_to')
                    ->relationship('assignedTo', 'name'),
                
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')->description(fn (Ticket $record): string => $record?->description??  ''),
                BadgeColumn::make('status')
                    ->colors([
                        'warning' => self::$model::STATUS['Archived'],
                        'success' => self::$model::STATUS['Closed'],
                        'danger' => self::$model::STATUS['Open'],
                    ]),
                BadgeColumn::make('priority')
                    ->colors([
                        'warning' => self::$model::PRIORITY['Medium'],
                        'success' => self::$model::PRIORITY['Low'],
                        'danger' => self::$model::PRIORITY['High'],
                    ]),
                TextColumn::make('assignedTo.name'),
                TextColumn::make('assignedBy.name'),
                TextInputColumn::make('comment'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ]);
    }
    
    public static function getRelations(): array
    {
        return [
            RelationManagers\CategoriesRelationManager::class,
            RelationManagers\LabelsRelationManager::class,
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTickets::route('/'),
            'create' => Pages\CreateTicket::route('/create'),
            'view' => Pages\ViewTicket::route('/{record}'),
            'edit' => Pages\EditTicket::route('/{record}/edit'),
        ];
    }    
}
