<?php

namespace App\Controller\Admin;

use App\Entity\Hospcat;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;

class HospcatCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Hospcat::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
           
            AssociationField::new('hospital','Hospital'),
            AssociationField::new('categoria','Categoría'),
            
        ];
    }
    
}
