<?php

namespace App\Exports;

use App\Models\Article;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ArticlesExport implements FromCollection, WithMapping, WithHeadings, WithStyles, ShouldAutoSize
{
    protected $articles;

    public function __construct($articles)
    {
        $this->articles = $articles;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return $this->articles;
    }

    public function map($articles): array
    {
        // Mapea los campos que deseas exportar en cada fila del Excel
        return [
            $articles->id,
            $articles->order,
            $articles->title,
            $articles->content,
            $articles->is_published,
            $articles->Imagen,
            $articles->created_at,
        ];
    }

    public function headings(): array
    {
        // Obtén los títulos de las columnas de DataTables y devuélvelos como encabezados en el archivo Excel
        return [
            "ID",
            "Orden",
            "Título",
            "Contenido",
            "Autor",
            "Publicado",
            "Imagen",
            "Creado"
            // Agrega aquí los demás títulos de columnas
        ];
    }

    public function styles(Worksheet $sheet)
    {
        // Define los estilos que deseas aplicar en el Excel
        return [
            // Estilos para la fila de encabezado
            1 => ['font' => ['bold' => true]],
            
            // Estilos para las celdas de la segunda columna (B)
            'B' => ['font' => ['bold' => true], 'alignment' => ['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT]],
        ];
    }
}
