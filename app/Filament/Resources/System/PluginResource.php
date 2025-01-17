<?php

namespace App\Filament\Resources\System;

use App\Filament\Resources\System\PluginResource\Pages;
use App\Filament\Resources\System\PluginResource\RelationManagers;
use App\Models\Plugin;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\HtmlString;

class PluginResource extends Resource
{
    protected static ?string $model = Plugin::class;

    protected static ?string $navigationIcon = 'heroicon-o-plus-circle';

    protected static ?string $navigationGroup = 'System';

    protected static ?int $navigationSort = 99;

    protected static bool $shouldRegisterNavigation = false;

    protected static function getNavigationLabel(): string
    {
        return __('admin.sidebar.plugin');
    }

    public static function getBreadcrumb(): string
    {
        return self::getNavigationLabel();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('package_name')->label(__('label.plugin.package_name')),
                Forms\Components\TextInput::make('remote_url')->label(__('label.plugin.remote_url')),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id'),
                Tables\Columns\TextColumn::make('package_name')->label(__('plugin.labels.package_name')),
                Tables\Columns\TextColumn::make('remote_url')->label(__('plugin.labels.remote_url')),
                Tables\Columns\TextColumn::make('installed_version')->label(__('plugin.labels.installed_version')),
                Tables\Columns\TextColumn::make('statusText')->label(__('label.status')),
            ])
            ->filters([
                //
            ])
            ->actions(self::getActions())
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManagePlugins::route('/'),
        ];
    }

    private static function getActions()
    {
        $actions = [];
        $actions[] = Tables\Actions\EditAction::make();
        $actions[] = self::buildInstallAction();
        $actions[] = self::buildUpdateAction();
        $actions[] = Tables\Actions\DeleteAction::make('delete')
            ->hidden(fn ($record) => $record->status == Plugin::STATUS_NOT_INSTALLED)
            ->using(function ($record) {
            $record->update(['status' => Plugin::STATUS_PRE_DELETE]);
        });
        return $actions;
    }

    private static function buildInstallAction()
    {
        return Tables\Actions\Action::make('install')
            ->label(__('plugin.actions.install'))
            ->icon('heroicon-o-arrow-down')
            ->requiresConfirmation()
            ->hidden(fn ($record) => $record->status == Plugin::STATUS_NORMAL)
            ->action(function ($record) {
                $record->update(['status' => Plugin::STATUS_PRE_INSTALL]);
            })
        ;
    }

    private static function buildUpdateAction()
    {
        return Tables\Actions\Action::make('update')
            ->label(__('plugin.actions.update'))
            ->icon('heroicon-o-arrow-up')
            ->requiresConfirmation()
            ->hidden(fn ($record) => in_array($record->status, [Plugin::STATUS_NOT_INSTALLED, Plugin::STATUS_PRE_UPDATE]))
            ->action(function ($record) {
                $record->update(['status' => Plugin::STATUS_PRE_UPDATE]);
            })
        ;
    }

}
