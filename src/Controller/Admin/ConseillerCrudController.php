<?php

namespace App\Controller\Admin;

use App\Entity\Conseiller;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ConseillerCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Conseiller::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('Nom'),
            TextField::new('Prenoms'),
            DateField::new('DateNomination'),
            TextField::new('ArreteNomin'),
            DateField::new('DateAbrog'),
            TextField::new('ArreteAbrog'),
            ChoiceField::new('Titre')
            ->setLabel("Titre")
            ->allowMultipleChoices(false)
            ->renderExpanded(true)
            
            ->setChoices( ['CTP' => 'CTP','CTNP' => 'CTNP']),
            AssociationField::new('Deputes')->autocomplete(),
            TextField::new('Telephone'),
            TextareaField::new('Observation'),




           
        ];
    }
    
}
