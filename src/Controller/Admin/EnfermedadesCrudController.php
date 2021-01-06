<?php

namespace App\Controller\Admin;

use App\Entity\Enfermedades;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;

class EnfermedadesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Enfermedades::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
             TextField::new('nombre','Nombre'),
            TextField::new('descripcion','Descripción'),
            AssociationField::new('categoria','Categoría'),
        ];
    }
    
}
