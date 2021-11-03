<?php

namespace App\Controller\Admin;

use App\Entity\Dircab;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class DircabCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Dircab::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('Nom'),
            TextField::new('Prenoms'),
            DateField::new('Date_Nomin'),
            TextField::new('Arrete_Nomin'),
            DateField::new('Date_Abrog'),
            TextField::new('Arrete_Abrog'),
            ChoiceField::new('titre')
            ->setLabel("titre")
            ->allowMultipleChoices(false)
            ->renderExpanded(true)
            ->setChoices( ['DIRCAB' => 'DIRCAB']),
            AssociationField::new('depute')->autocomplete(),
            TextField::new('Phone'),
            TextField::new('observation'),
            
        ];
    }
    
}
