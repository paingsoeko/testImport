<?php

namespace App\Filament\Imports;

use App\Models\Student;
use Filament\Actions\Imports\ImportColumn;
use Filament\Actions\Imports\Importer;
use Filament\Actions\Imports\Models\Import;

class StudentImporter extends Importer
{
    protected static ?string $model = Student::class;

    public static function getColumns(): array
    {
        return [
            ImportColumn::make('student_id')
            ->label('Student ID'),
            ImportColumn::make('approve_no')
            ->label('ဝင်ခွင့်စဥ်'),
            ImportColumn::make('arwatha_no')
            ->label('အဝသ အမှတ်'),
            ImportColumn::make('university_type')
            ->label('University Types'),
            ImportColumn::make('name')
                ->label('အမည်')
                ->requiredMapping()
                ->rules(['required']),
            ImportColumn::make('nrc_code1')
            ->label('NRC Code'),
            ImportColumn::make('nrc_no1')
            ->label('NRC No'),
            ImportColumn::make('date_of_birt')
            ->label('မွေးသက္ကရာဇ်'),
            ImportColumn::make('grade10_desk_id')
            ->label('ဆယ်တန်းခုံနံပါတ်'),
            ImportColumn::make('grade10_total_mark')
            ->label('အမှတ်ပေါင်း'),
            ImportColumn::make('academic_year')
            ->label('ပညာသင်နှစ်'),
            ImportColumn::make('recent_year_desk_id')
            ->label('ယခင်နှစ်ခုံနံပါတ်'),
            ImportColumn::make('this_year')
            ->label('ခုနှစ်'),
            ImportColumn::make('grade_10_year_check')
            ->label('Grade Check'),
            ImportColumn::make('major')
                ->label('လျှောက်မည့်မေဂျာ')
                ->requiredMapping()
                ->rules(['required']),
            ImportColumn::make('attendance_year')
                ->label('တက်ရောက်မည့်နှစ်')
                ->requiredMapping()
                ->rules(['required']),
            ImportColumn::make('this_year_desk_id')
                ->label('ယခုနှစ်ခုံအမှတ်')
                ->requiredMapping()
                ->rules(['required']),
            ImportColumn::make('this_year_desk_no')
            ->label('ယခုနှစ်ခုံနံပါတ်'),
            ImportColumn::make('father_name')
            ->label('အဖအမည်'),
            ImportColumn::make('nrc_code2')
            ->label('NRC Code1'),
            ImportColumn::make('nrc_no2')
            ->label('NRC No1'),
            ImportColumn::make('mother_name')
            ->label('အမိအမည်'),
            ImportColumn::make('nrc_code3')
            ->label('NRC Code2'),
            ImportColumn::make('nrc_no3')
            ->label('NRC No2'),
            ImportColumn::make('recent_desk_id_and_year_1')
            ->label('ခုံနံပါတ် နှင့် ခုနှစ် 1'),
            ImportColumn::make('recent_desk_id_and_year_2')
            ->label('ခုံနံပါတ် နှင့် ခုနှစ် 2'),
            ImportColumn::make('recent_desk_id_and_year_3')
            ->label('ခုံနံပါတ် နှင့် ခုနှစ် 3'),
            ImportColumn::make('recent_desk_id_and_year_4')
            ->label('ခုံနံပါတ် နှင့် ခုနှစ် 4'),
            ImportColumn::make('recent_desk_id_and_year_5')
            ->label('ခုံနံပါတ် နှင့် ခုနှစ် 5'),
            ImportColumn::make('phone_1')
            ->label('ဖုန်းနံပါတ် 1'),
            ImportColumn::make('phone_2')
            ->label('ဖုန်းနံပါတ် 2'),
            ImportColumn::make('address')
            ->label('နေရပ်လိပ်စာ'),
            ImportColumn::make('assignment_a')
            ->label('Assignment A'),
            ImportColumn::make('assignment_b')
            ->label('Assignment B'),
            ImportColumn::make('remark')
            ->label('မှတ်ချက်'),
        ];
    }

    public function resolveRecord(): ?Student
    {
        // return Student::firstOrNew([
        //     // Update existing records, matching them by `$this->data['column_name']`
        //     'email' => $this->data['email'],
        // ]);

        return new Student();
    }

    public static function getCompletedNotificationBody(Import $import): string
    {
        $body = 'Your student import has completed and ' . number_format($import->successful_rows) . ' ' . str('row')->plural($import->successful_rows) . ' imported.';

        if ($failedRowsCount = $import->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to import.';
        }

        return $body;
    }
}
