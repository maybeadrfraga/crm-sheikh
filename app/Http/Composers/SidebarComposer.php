<?php

// app/Http/Composers/SidebarComposer.php
namespace App\Http\Composers;

use Illuminate\View\View;
use App\Models\Company; // Supondo que você tenha um modelo Company

class SidebarComposer
{
    public function compose(View $view)
    {
        // Carrega todas as empresas
        $companies = Company::all(); // Ajuste isso conforme sua lógica de carregamento de empresas
        $view->with('companies', $companies);
    }
}
