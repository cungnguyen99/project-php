<?php

namespace App\Exports;

use App\Models\Revenue;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExcelExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return collect(Revenue::getDecoration());
    }

    public function headings(): array
    {
        return ["Tên Phim", "Ngày Khởi chiếu", "Ngày kết thúc", "Doanh thu"];
    }
}
