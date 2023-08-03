<?php

namespace App\Exports;

use App\Book;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BooksExport implements FromCollection, WithHeadings
{
    protected $books;

    public function __construct($books)
    {
        $this->books = $books;
    }

    public function collection()
    {
        return $this->books;
    }

    public function headings(): array
    {
        return [
            'Title',
            'Author',
        ];
    }
}
