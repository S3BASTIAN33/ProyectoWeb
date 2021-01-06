<?php

namespace App\Controller;
use App\Entity\Enfermedades;
use App\Entity\Categorias;
use App\Entity\Hospitales;
use App\Entity\Hospcat;
use App\Repository\CategoriasRepository;
use App\Repository\EnfermedadesRepository;
use App\Repository\HospitalesRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\Required;

class CoreController extends AbstractController
{
    /**
     * @Route("/core", name="core")
     */
   /* public function index(): Response
    {
        return $this->render('core/index.html.twig', [
            'controller_name' => 'CoreController',
        ]);
    }*/

    public function busqueda(){
        print("Ingrese la enfermedad y la ciudad del hospital");
        $formulario= $this->createFormBuilder()
        ->setAction($this->generateUrl('corebusqueda'))
        ->add('Enfermedad', TextType::class)
        ->add('Ciudad', TextType::class)
        ->add('Buscar', SubmitType::class, ['attr'=>['class'=>'btn btn-primary']])
        
        ->getForm();
        

       
        return $this->render('core/busqueda.html.twig', ['formulario'=> $formulario->createView()]);
      
    }
      /**
     * @Route("/corebusqueda", name="corebusqueda")
     * @param Request $request
     */
    public function corebusqueda(Request $request, EnfermedadesRepository $enfRe, PaginatorInterface $paginator, HospitalesRepository $ubi){
      $ingreso=$request->request->get('form')['Enfermedad'];
      $ingresou=$request->request->get('form')['Ciudad'];
  
      $em=$this->getDoctrine()->getManager();
  
      if ($ingreso){
        $buse= $enfRe->busenf($ingreso, $ingresou);
     
          if($buse==null){
          print("No se encontro hospital que atienda la enfermedad ${ingreso} en la cuidad ${ingresou}");
         
       } 
        $pagination = $paginator->paginate(
        $enfRe->busenf($ingreso, $ingresou),
        $request->query->getInt('page', 1), 
        15 
        );
        return $this->render('core/index.html.twig', ['pagination' => $pagination]);
      
      }

    }
    
}
