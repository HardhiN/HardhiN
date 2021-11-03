<?php

namespace App\Controller\Admin;
use App\Entity\User;
use App\Entity\Depute;
use App\Entity\Dircab;
use App\Entity\Assistant;
use App\Entity\Conseiller;
use App\Controller\StatistiqueController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        $deputes= $this->getDoctrine()->getRepository(Depute::Class)->count(array());
        $assistants= $this->getDoctrine()->getRepository(Assistant::Class)->CountAssitant();
        $conseillers= $this->getDoctrine()->getRepository(Conseiller::Class)->CountConseiller();
        $dircabs= $this->getDoctrine()->getRepository(Dircab::Class)-> CountDircab();
        $APNP= $this->getDoctrine()->getRepository(Assistant::Class)->findBySomeField('APNP');
        $APP= $this->getDoctrine()->getRepository(Assistant::Class)->findBySomeField('APP');
        $ATP= $this->getDoctrine()->getRepository(Assistant::Class)->findBySomeField('ATP');
        $ATNP= $this->getDoctrine()->getRepository(Assistant::Class)->findBySomeField('ATNP');
        $CTP= $this->getDoctrine()->getRepository(Conseiller::Class)->findBySomeField('CTP');
        $CTNP= $this->getDoctrine()->getRepository(Conseiller::Class)->findBySomeField('CTNP');
        $DircabAbrog=$this->getDoctrine()->getRepository(Dircab::Class)->CountDirAbrog();
        $ConsAbrog=$this->getDoctrine()->getRepository(Conseiller::Class)->CountConsAbrog();
        $AssAbrog=$this->getDoctrine()->getRepository(Assistant::Class)->CountAssAbrog();
        return $this->render('statistique.html.twig', [
            'depCount' => $deputes ,
            'assCount' => $assistants,
            'consCount'=> $conseillers,
            'dirCount'=> $dircabs,
            'APNP'=> $APNP,
            'APP'=> $APP,
            'ATP'=> $ATP,
            'ATNP'=> $ATNP,
            'CTP'=> $CTP,
            'CTNP'=> $CTNP,
            'DirAbrog'=> $DircabAbrog,
            'ConsAbrog'=>$ConsAbrog,
            'AssAbrog'=> $AssAbrog

        ]);
    
       
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Administration SGPAP');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::section('Statistique et Administration des utilisateurs ');
        yield MenuItem::linktoDashboard('Statistique', 'fas fa-marker');
        yield MenuItem::linkToRoute('Gerer utilisateur', 'fas fa-marker', 'user_index');
       
        
        yield MenuItem::section('Deputes et Personnels d\'apuis au parelementaires');
        yield MenuItem::linkToCrud('Deputes', 'fas fa-list', Depute::class);
        yield MenuItem::linkToCrud('Assistants', 'fas fa-list', Assistant::class);
        yield MenuItem::linkToCrud('Conseiller', 'fas fa-list', Conseiller::class);
        yield MenuItem::linkToCrud('Dircab', 'fas fa-list', Dircab::class);
        yield MenuItem::section('Liens vers');
        yield MenuItem::linkToRoute('retour au site', 'fa fa-home', 'home');
    }
}
