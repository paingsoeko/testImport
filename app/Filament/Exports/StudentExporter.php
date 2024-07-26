<?php

namespace App\Filament\Exports;

use App\Models\Student;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;

class StudentExporter extends Exporter
{
    protected static ?string $model = Student::class;

    public static function getColumns(): array
    {
        return [
//            ExportColumn::make('id')
//                ->label('ID'),
//            ExportColumn::make('student_id'),
//            ExportColumn::make('approve_no')
//            ->label('ဝင်ခွင့်စဥ်'),
//            ExportColumn::make('arwatha_no')
//            ->label('အဝသ'),
//            ExportColumn::make('university_type')
//            ->label('တက္ကသိုလ်'),
            ExportColumn::make('name')
            ->label('အမည်'),
//            ExportColumn::make('nrc_combined')
//                ->label('မှတ်ပုံတင်')
//                ->state(function (Student $record){
//                    return $record->nrc_code2. ' ' . $record->nrc_no2;
//                }),
//            ExportColumn::make('nrc_code2'),
//            ExportColumn::make('nrc_no2'),
//            ExportColumn::make('date_of_birt')
//            ->label('မွေးနေ့'),
//            ExportColumn::make('grade10_desk_id'),
//            ExportColumn::make('grade10_total_mark'),
//            ExportColumn::make('academic_year'),
            ExportColumn::make('recent_year_desk_id')
                ->label('ယခင်ခုံနံပါတ်'),
            ExportColumn::make('this_year_combine')
                ->label('ယခုခုံနံပါတ်')
                ->state(function (Student $record){
                    return $record->this_year_desk_id. '-' . $record->this_year_desk_no;
                }),
//            ExportColumn::make('this_year'),

            // ExportColumn::make('major')
            //     ->label('မေဂျာ'),
            // ExportColumn::make('attendance_year')
            //     ->label('နှစ်'),
//            ExportColumn::make('nrc_combined')
//                ->label('ခုံနံပါတ်')
//                ->getValueFrom(function ($record) {
//                    return $record->this_year_desk_id . '-' . $record->this_year_desk_no;
//                }),

//            ExportColumn::make('this_year_desk_id'),
//            ExportColumn::make('this_year_desk_no'),
            // ExportColumn::make('father_name')
            //     ->label('အဖေ'),
//            ExportColumn::make('nrc_code2'),
//            ExportColumn::make('nrc_no2'),
//            ExportColumn::make('nrc_combined')
//                ->label('မှတ်ပုံတင်')
//                ->getValueFrom(function ($record) {
//                    return $record->nrc_code2 . ' ' . $record->nrc_no2;
//                }),
            // ExportColumn::make('mother_name')
            // ->label('အမေ'),
//            ExportColumn::make('nrc_code3'),
//            ExportColumn::make('nrc_no3'),
//            ExportColumn::make('nrc_combined')
//                ->label('မှတ်ပုံတင်')
//                ->getValueFrom(function ($record) {
//                    return $record->nrc_code3 . ' ' . $record->nrc_no3;
//                }),
//            ExportColumn::make('recent_desk_id_and_year_1'),
//            ExportColumn::make('recent_desk_id_and_year_2'),
//            ExportColumn::make('recent_desk_id_and_year_3'),
//            ExportColumn::make('recent_desk_id_and_year_4'),
//            ExportColumn::make('recent_desk_id_and_year_5'),
            // ExportColumn::make('phone_1')
            // ->label('ဖုန်း ၁'),
            // ExportColumn::make('phone_2')
            //     ->label('ဖုန်း ၂'),
            // ExportColumn::make('address')
            //     ->label('လိပ်စာ'),
            ExportColumn::make('assignment_a'),
            ExportColumn::make('assignment_b'),
            ExportColumn::make('remark'),
//            ExportColumn::make('created_at'),
//            ExportColumn::make('updated_at'),
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Your student export has completed and ' . number_format($export->successful_rows) . ' ' . str('row')->plural($export->successful_rows) . ' exported.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to export.';
        }

        return $body;
    }

}
