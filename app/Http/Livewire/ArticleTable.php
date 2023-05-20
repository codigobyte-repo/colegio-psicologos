<?php

namespace App\Http\Livewire;

use App\Exports\ArticlesExport;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Article;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Columns\BooleanColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\ButtonGroupColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\ImageColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;
use Maatwebsite\Excel\Facades\Excel;

class ArticleTable extends DataTableComponent
{

    public function configure(): void
    {
        /* Identificador de clave primaria */
        $this->setPrimaryKey('id')
            /* Si deseamos que el contenido de la página sea linkeable */
            ->setTableRowUrl(function($row){
                return route('dashboard', [
                    'id' => $row->id
                ]);
            /* que el linkeo sea a una página nueva */
            })->setTableRowUrlTarget(function($row){
                return '_blank';
            });


        $this->setDefaultSort('id', 'asc');
        $this->setSingleSortingDisabled();

        /* Cambiar el nombre de paginación por defecto */
        $this->setPageName('pagina');
        
        /* Páginaciones de tanto en tanto */
        $this->setPerPageAccepted([
            5,
            10,
            15,
            50,
            -1
        ]);

        /* Setear la cantidad de páginas por defecto */
        $this->setPerPage(5);

        $this->setBulkActions([
            'deleteSelected' => 'Eliminar',
            'exportSelected' => 'Exportar'
        ]);
    }

    public function columns(): array
    {
        return [
            Column::make("ID", "id")
            ->sortable()
            ->collapseOnMobile(),

            Column::make("Orden", "sort")
            ->sortable()
            ->collapseOnMobile()->unclickable(),

            Column::make("Título", "title")
            ->sortable()
            ->searchable(fn($query, $searchTerm) => $query->orWhere('title', 'like', '%' . $searchTerm . '%')),

            Column::make("Contenido", "content")
            ->collapseOnMobile(),

            Column::make("Autor", "user.name")
            ->searchable()
            ->collapseOnMobile(),

            BooleanColumn::make("Publicado", "is_published")
            ->collapseOnMobile(),

            ImageColumn::make('Imagen')
            ->location(fn() => 'https://cdn.icon-icons.com/icons2/1804/PNG/512/iconfinder-495-globe-internet-online-graduation-4212918_114940.png')
            ->collapseOnMobile(),

            Column::make("Creado", "created_at")->sortable()
            ->format(fn($value) => $value->format('d/m/Y'))
            ->collapseOnMobile(),

            Column::make('Acciones')
            ->label(fn($row) => view('articles.tables.actions', [
                'id' => $row->id
            ]))
            ->collapseOnMobile()
            ->unclickable(),
            
        ];
    }

    /* Relación */
    public function builder(): Builder
    {
        return Article::query()
                ->with('user');
    }

    /* Eliminar masivamente */
    public function deleteSelected()
    {
        if($this->getSelected()){
            /* elimina los campos seleccionados */
            Article::whereIn('id', $this->getSelected())->delete();
            /* Limpia las selecciones */
            $this->clearSelected(); 
        }else{
            $this->emit('error', 'No hay registros seleccionados');
        }       
    }

    /* Función para exportar */
    public function exportSelected()
    {
        if($this->getSelected()){

            
            $articles = Article::whereIn('id', $this->getSelected())->get();
            
            /* Limpia las selecciones */
            $this->clearSelected();

            return Excel::download(new ArticlesExport($articles), 'articles.xlsx');

        }else{
                    //exportamos lo que se esté viendo
            return Excel::download(new ArticlesExport($this->getRows()), 'articles.xlsx');
        }   
    }
}
