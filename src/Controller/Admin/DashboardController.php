<?php

namespace App\Controller\Admin;

use App\Entity\Hospcat;
use App\Entity\Hospitales;
use App\Entity\Categorias;
use App\Entity\Enfermedades;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Router\CrudUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
         $routeBuilder = $this->get(CrudUrlGenerator::class)->build();

        return $this->redirect($routeBuilder->setController(HospitalesCrudController::class)->generateUrl());
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Administrador');
    }

    public function configureMenuItems(): iterable
    {
              yield MenuItem::section('Opciones');

        yield MenuItem::linkToCrud('Hospitales', 'iron class', Hospitales::class);
       yield MenuItem::linkToCrud('Categorias', 'iron class', Categorias::class);
        yield MenuItem::linkToCrud('Enfermedades', 'iron class', Enfermedades::class);
        yield MenuItem::linkToCrud('Hospcat', 'iron class', Hospcat::class);
    }
}
