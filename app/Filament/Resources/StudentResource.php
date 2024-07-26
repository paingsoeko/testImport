<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StudentResource\Pages;
use App\Filament\Resources\StudentResource\RelationManagers;
use App\Models\Student;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Enums\ActionsPosition;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class StudentResource extends Resource
{
    protected static ?string $model = Student::class;
    protected static ?string $recordTitleAttribute = 'name';
    protected static ?string $navigationLabel = 'ကျောင်းအပ် အချက်လက်';
    protected static ?string $navigationIcon = 'heroicon-s-folder-open';

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function getNavigationBadgeTooltip(): ?string
    {
        return 'ကျောင်းသားအရေအတွက်';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('student_id'),
                Forms\Components\TextInput::make('approve_no'),
                Forms\Components\TextInput::make('arwatha_no'),
                Forms\Components\TextInput::make('university_type'),
                Forms\Components\TextInput::make('name')
                    ->required(),
                Forms\Components\TextInput::make('nrc_code1'),
                Forms\Components\TextInput::make('nrc_no1'),
                Forms\Components\DatePicker::make('date_of_birt'),
                Forms\Components\TextInput::make('grade10_desk_id'),
                Forms\Components\TextInput::make('grade10_total_mark'),
                Forms\Components\TextInput::make('academic_year'),
                Forms\Components\TextInput::make('recent_year_desk_id'),
                Forms\Components\TextInput::make('this_year'),
                Forms\Components\TextInput::make('grade_10_year_check'),
                Forms\Components\TextInput::make('major')
                    ->required(),
                Forms\Components\TextInput::make('attendance_year')
                    ->required(),
                Forms\Components\TextInput::make('this_year_desk_id')
                    ->required(),
                Forms\Components\TextInput::make('this_year_desk_no')
                    ->required(),
                Forms\Components\TextInput::make('father_name'),
                Forms\Components\TextInput::make('nrc_code2'),
                Forms\Components\TextInput::make('nrc_no2'),
                Forms\Components\TextInput::make('mother_name'),
                Forms\Components\TextInput::make('nrc_code3'),
                Forms\Components\TextInput::make('nrc_no3'),
                Forms\Components\TextInput::make('recent_desk_id_and_year_1'),
                Forms\Components\TextInput::make('recent_desk_id_and_year_2'),
                Forms\Components\TextInput::make('recent_desk_id_and_year_3'),
                Forms\Components\TextInput::make('recent_desk_id_and_year_4'),
                Forms\Components\TextInput::make('recent_desk_id_and_year_5'),
                Forms\Components\TextInput::make('phone_1')
                    ->tel(),
                Forms\Components\TextInput::make('phone_2')
                    ->tel(),
                Forms\Components\Textarea::make('address')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('assignment_a'),
                Forms\Components\TextInput::make('assignment_b'),
                Forms\Components\Textarea::make('remark')
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
//                Tables\Columns\TextColumn::make('student_id')
//                    ->searchable(),
                Tables\Columns\TextColumn::make('approve_no')
                    ->label('ဝင်ခွင့်စဥ်')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('arwatha_no')
                    ->label('အဝသအမှတ်')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('name')
                    ->label('အမည်')
                    ->searchable(),
//                Tables\Columns\TextColumn::make('nrc_code1')
//                    ->searchable(),
//                Tables\Columns\TextColumn::make('nrc_no1')
//                    ->searchable(),
                TextColumn::make('nrc_combined')
                    ->label('မှတ်ပုံတင်')
                    ->getStateUsing(function ($record) {
                        return $record->nrc_code1 . '' . $record->nrc_no1;
                    })
                    ->searchable([
                        'nrc_code1',
                        'nrc_no1'
                    ]),
                Tables\Columns\TextColumn::make('university_type')
                    ->label('တက္ကသိုလ်အမျိုးစား')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('date_of_birt')
                    ->label('မွေးနေ့')
                    ->date()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('grade10_desk_id')
                    ->label('၁၀တန်းခုံနံပါတ်')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('grade10_total_mark')
                    ->label('၁၀တန်းအမှတ်ပေါင်း')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
//                Tables\Columns\TextColumn::make('academic_year')
//                    ->label('တက္ကသိုလ်အမျိုးစား')
//                    ->searchable(),
                Tables\Columns\TextColumn::make('recent_year_desk_id')
                    ->label('ယခင်နှစ်ခုံနံပါတ်')
                    ->searchable(),
//                Tables\Columns\TextColumn::make('this_year')
//                    ->label('တက်ရောက်မည့်နှစ်')
//                    ->searchable(),
                Tables\Columns\TextColumn::make('grade_10_year_check'),
                Tables\Columns\TextColumn::make('major')
                    ->label('မေဂျာ')
                    ->searchable(),
                Tables\Columns\TextColumn::make('attendance_year')
                    ->label('တက်ရောက်မည့်နှစ်')
                    ->searchable(),
                Tables\Columns\TextColumn::make('this_year_desk_id')
                    ->label('ယခုနှစ်ခုံအမှတ်')
                    ->searchable(),
                Tables\Columns\TextColumn::make('this_year_desk_no')
                    ->label('ယခုနှစ်ခုံနံပါတ်')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('father_name')
                    ->label('အဖေ')
                    ->searchable(),
//                Tables\Columns\TextColumn::make('nrc_code2')
//                    ->searchable(),
//                Tables\Columns\TextColumn::make('nrc_no2')
//                    ->searchable(),
                TextColumn::make('nrc_combined2')
                    ->label('မှတ်ပုံတင်')
                    ->getStateUsing(function ($record) {
                        return $record->nrc_code2 . '' . $record->nrc_no2;
                    })
                    ->searchable([
                        'nrc_code2',
                        'nrc_no2'
                    ]),
                Tables\Columns\TextColumn::make('mother_name')
                    ->label('အမေ')
                    ->searchable(),
//                Tables\Columns\TextColumn::make('nrc_code3')
//                    ->searchable(),
//                Tables\Columns\TextColumn::make('nrc_no3')
//                    ->searchable(),
                TextColumn::make('nrc_combined3')
                    ->label('မှတ်ပုံတင်')
                    ->getStateUsing(function ($record) {
                        return $record->nrc_code3 . '' . $record->nrc_no3;
                    })
                    ->searchable([
                        'nrc_code3',
                        'nrc_no3'
                    ]),
//                Tables\Columns\TextColumn::make('recent_desk_id_and_year_1')
//                    ->searchable(),
//                Tables\Columns\TextColumn::make('recent_desk_id_and_year_2')
//                    ->searchable(),
//                Tables\Columns\TextColumn::make('recent_desk_id_and_year_3')
//                    ->searchable(),
//                Tables\Columns\TextColumn::make('recent_desk_id_and_year_4')
//                    ->searchable(),
//                Tables\Columns\TextColumn::make('recent_desk_id_and_year_5')
//                    ->searchable(),
                Tables\Columns\TextColumn::make('phone_1')
                    ->label('ဖုန်း၁')
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone_2')
                    ->label('ဖုန်း၂')
                    ->searchable(),
                Tables\Columns\TextColumn::make('assignment_a')
                    ->searchable(),
                Tables\Columns\TextColumn::make('assignment_b')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            // ->defaultSort('this_year_desk_no', 'desc')
            ->filters([
                SelectFilter::make('university_type')
                    ->label('တက္ကသိုလ်')
                    ->options(function () {
                        return Student::query()
                            ->select('university_type')
                            ->distinct()
                            ->pluck('university_type', 'university_type')
                            ->toArray();
                    })->native(false),
                SelectFilter::make('major')
                    ->label('မေဂျာ')
                    ->options(function () {
                        return Student::query()
                            ->select('major')
                            ->distinct()
                            ->pluck('major', 'major')
                            ->toArray();
                    })->native(false),
                SelectFilter::make('attendance_year')
                    ->label('တက်ရောက်မည့်နှစ်')
                    ->multiple()
                    ->options(function () {
                        return Student::query()
                            ->select('attendance_year')
                            ->distinct()
                            ->pluck('attendance_year', 'attendance_year')
                            ->toArray();
                    })->native(false),
                    SelectFilter::make('grade_10_year_check')
                    ->options(function () {
                        return Student::query()
                            ->whereNotNull('grade_10_year_check') // Ensure no null values are selected
                            ->select('grade_10_year_check')
                            ->distinct()
                            ->pluck('grade_10_year_check', 'grade_10_year_check')
                            ->toArray();
                    })->native(false),
            ], layout: FiltersLayout::AboveContent)
            ->actions([
                Tables\Actions\EditAction::make(),
            ],position: ActionsPosition::BeforeColumns)
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->requiresConfirmation(),
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
            'index' => Pages\ListStudents::route('/'),
            'create' => Pages\CreateStudent::route('/create'),
            'edit' => Pages\EditStudent::route('/{record}/edit'),
        ];
    }
}
