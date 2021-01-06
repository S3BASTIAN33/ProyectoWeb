<?php

namespace App\Controller\Admin;

use App\Entity\Hospitales;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;

class HospitalesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Hospitales::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('nombre','Nombre'),
            Field::new('telefono','Teléfono'),
            TextField::new('email','E-mail'),
            TextField::new('direccion','Dirección'),
            TextField::new('descripcion','Descripción'),
        ];
    }
    
}
