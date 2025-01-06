<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BlogResource\Pages;
use App\Filament\Resources\BlogResource\RelationManagers;
use App\Models\Blog;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\RichEditor;
use Str;

class BlogResource extends Resource
{
    protected static ?string $model = Blog::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Blog Details')
                    ->schema([
                        RichEditor::make('title')
                            ->toolbarButtons([
                                'h1',
                                'h2',
                                'h3',
                            ])
                            ->required()
                            ->reactive()
                            ->afterStateUpdated(fn($state, callable $set) =>
                                $set('slug', Str::slug(strip_tags($state))))
                            ->label('Title')

                            ->maxLength(255),
                        RichEditor::make('description')
                            ->toolbarButtons([
                                'attachFiles',
                                'blockquote',
                                'bold',
                                'bulletList',
                                'codeBlock',
                                'h1',
                                'h2',
                                'h3',
                                'italic',
                                'link',
                                'orderedList',
                                'redo',
                                'strike',
                                'underline',
                                'undo',
                            ])
                            ->required()
                            ->columnSpanFull(),
                        Forms\Components\Section::make()
                            ->schema([
                                Forms\Components\FileUpload::make('image')
                                    ->image()
                                    ->required(),
                                Forms\Components\Select::make('privacy')
                                    ->required()
                                    ->options([
                                        'public' => 'Public',
                                        'private' => 'Private',
                                    ])
                                    ->native(false)
                            ])->columns(2),
                    ]),
                Forms\Components\Section::make('SEO Details')
                    ->schema([
                        Forms\Components\TextInput::make('meta_tags')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('image_alt')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Textarea::make('meta_description')
                            ->required()
                            ->columnSpanFull(),
                        Forms\Components\Textarea::make('tags')
                            ->label('Focus Keywords')
                            ->required()
                            ->columnSpanFull(),
                    ]),
                Forms\Components\Section::make('Other Settings')
                    ->schema([
                        Forms\Components\TextInput::make('slug')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\DateTimePicker::make('published_at'),
                        Forms\Components\Select::make('category_id')
                            ->relationship(name: 'category', titleAttribute: 'name')
                            ->searchable()
                            ->preload()
                            ->required(),
                        Forms\Components\Select::make('featured_article')
                            ->label('Featured Post')
                            ->options([
                                true => 'Yes',
                            ])
                            ->native(false)
                    ])->columns(2),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->limit(50)
                    ->html()
                    ->searchable(),
                Tables\Columns\ImageColumn::make('image'),
                Tables\Columns\TextColumn::make('privacy')
                    ->searchable(),
                Tables\Columns\TextColumn::make('slug')
                    ->limit(50)
                    ->searchable(),
                Tables\Columns\TextColumn::make('published_at')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('category.name')
                    ->label('Category')
                    ->sortable(),
                Tables\Columns\TextColumn::make('image_alt')
                    ->limit(10),
                Tables\Columns\IconColumn::make('featured_article')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListBlogs::route('/'),
            'create' => Pages\CreateBlog::route('/create'),
            'edit' => Pages\EditBlog::route('/{record}/edit'),
        ];
    }
}
